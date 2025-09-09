<?php

namespace App\Console\Commands;

use App\Models\Artist;
use App\Models\Track;
use App\Services\SpotifyService;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class SyncSpotify extends Command
{
    protected $signature = 'spotify:sync {--limit=0 : Limit number of artists processed this run}';
    protected $description = 'Fetch artists + top tracks using client-credentials with cached token (10m buffer)';

    public function handle(SpotifyService $spotify): int
    {
        $query = Artist::query()->orderBy('id');
        if ($lim = (int) $this->option('limit')) {
            $query->limit($lim);
        }

        $artists = $query->get();
        if ($artists->isEmpty()) {
            $this->warn('No artists found. Add rows to the artists table first.');
            return self::SUCCESS;
        }

        foreach ($artists as $artistRow) {
            $artistId = $artistRow->spotify_id;

            // Artist core
            $artist = $spotify->getArtist($artistId);
            $artistRow->update([
                'name'       => $artist['name'] ?? $artistRow->name,
                'image'      => Arr::get($artist, 'images.0.url', $artistRow->image),
                'popularity' => $artist['popularity'] ?? $artistRow->popularity,
                // monthly_listeners stays as-is (only via unofficial/scrape if you add that later)
            ]);

            // Top tracks (official popularity)
            $topTracks = $spotify->getArtistTopTracks($artistId);
            foreach (($topTracks['tracks'] ?? []) as $track) {
                Track::updateOrCreate(
                    ['spotify_id' => $track['id']],
                    [
                        'artist_id'  => $artistRow->id,
                        'name'       => $track['name'],
                        'image'      => Arr::get($track, 'album.images.0.url'),
                        'popularity' => $track['popularity'] ?? null,
                        // playcount stays null unless you add a scraper
                    ]
                );
            }

            $this->info("Refreshed: {$artistRow->name}");
            // tiny jitter to avoid bursty traffic
            usleep(random_int(50, 150) * 1000);
        }

        return self::SUCCESS;
    }
}
