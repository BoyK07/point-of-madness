<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Models\Artist;
use App\Services\SpotifyService;
use DateTime;
use Illuminate\Console\Command;

class SpotifySyncArtist extends Command
{
    protected $signature = 'spotify:sync-artist {--limit=0 : Limit number of artists processed this run}';
    protected $description = 'Fetch artist and albums using client-credentials with cached token (10m buffer)';

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

        // We'll only use one artist for the site
        $artistDB = $artists->first();
        $artist = $spotify->getArtist($artistDB->spotify_id);

        $artistDB->update([
            'name' => $artist['name'],
            'image' => $artist['images'][0]['url'],
        ]);

        // Sync albums
        $albums = $spotify->getArtistAlbums($artistDB->spotify_id);
        foreach ($albums as $album) {
            Album::updateOrCreate(
                ['spotify_id' => $album['id']],
                [
                    'artist_id'    => $artistDB->id,
                    'name'         => $album['name'],
                    'image'        => $album['images'][0]['url'] ?? '',
                    'album_type'   => $album['album_type'] ?? 'album',
                    'total_tracks' => $album['total_tracks'] ?? null,
                    'release_date' => isset($album['release_date']) ? (new DateTime($album['release_date']))->format('Y-m-d') : null,
                ]
            );
        }

        return self::SUCCESS;
    }
}


