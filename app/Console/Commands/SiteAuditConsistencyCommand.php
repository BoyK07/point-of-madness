<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class SiteAuditConsistencyCommand extends Command
{
    protected $signature = 'site:audit-consistency {--fix : Attempt safe automated fixes}';

    protected $description = 'Ensure views and source reference the SSOT helpers instead of hardcoded paths or text.';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $issues = [];
        $finder = (new Finder())
            ->files()
            ->in(base_path('app'))
            ->in(base_path('resources/views'))
            ->in(base_path('routes'))
            ->in(base_path('config'));

        foreach ($finder as $file) {
            $path = $file->getRealPath();

            if (Str::contains($path, 'SiteAuditConsistencyCommand.php')) {
                continue;
            }

            $contents = $file->getContents();
            $lines = preg_split('/\r?\n/', $contents);

            foreach ($lines as $index => $line) {
                $lineNumber = $index + 1;

                if (Str::contains($line, '/storage/')) {
                    $issues[] = [$path, $lineNumber, 'Direct /storage reference'];
                }

                if (Str::contains($line, 'Storage::url(')) {
                    $issues[] = [$path, $lineNumber, 'Storage::url() detected'];
                }

                if (preg_match("/asset\(['\"]images\/(.+?)\.(png|jpe?g|webp)['\"]\)/", $line, $matches)) {
                    $issues[] = [$path, $lineNumber, "asset() image reference: {$matches[0]}"];

                    if ($this->option('fix')) {
                        $purpose = Str::slug($matches[1], '.');
                        $replacement = "ssot_image_url('{$purpose}')";
                        $lines[$index] = Str::replace($matches[0], $replacement, $line);
                    }
                }
            }

            if ($this->option('fix')) {
                $newContents = implode(PHP_EOL, $lines);
                if ($newContents !== $contents) {
                    $this->files->put($path, $newContents);
                }
            }
        }

        if (empty($issues)) {
            $this->components->info('No consistency issues detected.');

            return self::SUCCESS;
        }

        $this->components->error('Potential inconsistencies found:');
        $this->table(['File', 'Line', 'Issue'], $issues);

        if ($this->option('fix')) {
            $this->components->info('Automatic replacements applied where possible. Please review changes.');
        } else {
            $this->components->warn('Run with --fix for simple replacements.');
        }

        return empty($issues) ? self::SUCCESS : self::FAILURE;
    }
}
