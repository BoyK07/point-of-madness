<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use App\Services\SpotifyService;
use DateTime;
use Illuminate\Console\Command;

class SpotifySyncTracks extends Command
{
    protected $signature = 'spotify:sync-tracks {--limit=0 : Limit number of artists processed this run}';
    protected $description = 'Fetch artist tracks and link to albums using client-credentials with cached token (10m buffer)';

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

        // Sync tracks and associate with albums
        $tracks = $spotify->getArtistTracks($artistDB->spotify_id);
        foreach ($tracks as $track) {
            $albumSpotifyId = $track['album']['id'] ?? null;
            $albumId = null;
            if ($albumSpotifyId) {
                $albumId = Album::where('spotify_id', $albumSpotifyId)->value('id');
            }

            Track::updateOrCreate(
                ['spotify_id' => $track['id']],
                [
                    'artist_id'    => $artistDB->id,
                    'album_id'     => $albumId,
                    'name'         => $track['name'],
                    'image'        => $track['album']['images'][0]['url'] ?? '',
                    'release_date' => isset($track['album']['release_date']) ? (new DateTime($track['album']['release_date']))->format('Y-m-d') : null,
                ]
            );
        }

        return self::SUCCESS;
    }
}


