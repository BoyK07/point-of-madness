<?php

namespace Database\Seeders;

use App\Models\Linktree;
use Illuminate\Database\Seeder;

class LinktreeSeeder extends Seeder
{
    /**
     * Seed the application's linktree links.
     */
    public function run(): void
    {
        $links = [
            [
                'name' => 'Spotify',
                'slug' => 'spotify',
                'url' => 'https://open.spotify.com/artist/1YhRX1mRz6rzQofSyzlszi',
                'category' => 'music',
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
                'url' => 'https://www.instagram.com/pointofmadnessband/',
                'category' => 'social',
            ],
            [
                'name' => 'TikTok',
                'slug' => 'tiktok',
                'url' => 'https://www.tiktok.com/@point.of.madness',
                'category' => 'social',
            ],
            [
                'name' => 'Amazon Music',
                'slug' => 'amazon_music',
                'url' => 'https://music.amazon.com/artists/B0CZV1WG82/point-of-madness',
                'category' => 'music',
            ],
            [
                'name' => 'Deezer',
                'slug' => 'deezer',
                'url' => 'https://www.deezer.com/us/artist/260843331',
                'category' => 'music',
            ],
            [
                'name' => 'Tidal',
                'slug' => 'tidal',
                'url' => 'https://tidal.com/artist/46872152',
                'category' => 'music',
            ],
            [
                'name' => 'Qobuz',
                'slug' => 'qobuz',
                'url' => 'https://open.qobuz.com/artist/22007984',
                'category' => 'music',
            ],
            [
                'name' => 'YouTube',
                'slug' => 'youtube',
                'url' => 'https://www.youtube.com/@PointofMadness',
                'category' => 'video',
            ],
            [
                'name' => 'YouTube Music',
                'slug' => 'youtube_music',
                'url' => 'https://music.youtube.com/channel/UC3byFEMycsebbNGxeFhx6CQ',
                'category' => 'music',
            ],
            [
                'name' => 'TOXIC - Music Video',
                'slug' => 'toxic_music_video',
                'url' => 'https://www.youtube.com/watch?v=HGcrZPMlOrw',
                'category' => 'video',
            ],
        ];

        foreach ($links as $link) {
            Linktree::updateOrCreate(
                ['slug' => $link['slug']],
                $link,
            );
        }
    }
}
