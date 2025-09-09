<?php

namespace App\Console\Commands;

use App\Models\Artist;
use App\Models\Album;
use App\Models\Track;
use App\Services\SpotifyService;
use DateTime;
use Illuminate\Console\Command;

class SpotifySync extends Command
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

        // We'll only use one artist for the site
        $artistDB = $artists->first();
        $artist = $spotify->getArtist($artistDB->spotify_id);

        $artistDB->update([
            'name' => $artist['name'],
            'image' => $artist['images'][0]['url'],
            'monthly_listeners' => $artist['monthly_listeners'] ?? 0, //TODO: Implement later
        ]);

        // Sync albums first
        $albums = $spotify->getArtistAlbums($artistDB->spotify_id);
        $albumIdBySpotifyId = [];
        foreach ($albums as $album) {
            $albumModel = Album::updateOrCreate(
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

            $albumIdBySpotifyId[$album['id']] = $albumModel->id;
        }

        // Sync tracks and associate with albums
        $tracks = $spotify->getArtistTracks($artistDB->spotify_id);
        foreach ($tracks as $track) {
            $albumSpotifyId = $track['album']['id'] ?? null;
            $albumId = $albumSpotifyId && isset($albumIdBySpotifyId[$albumSpotifyId]) ? $albumIdBySpotifyId[$albumSpotifyId] : null;

            Track::updateOrCreate(
                ['spotify_id' => $track['id']],
                [
                    'artist_id'    => $artistDB->id,
                    'album_id'     => $albumId,
                    'name'         => $track['name'],
                    'image'        => $track['album']['images'][0]['url'] ?? '',
                    'playcount'    => $track['playcount'] ?? 0, //TODO: Implement later
                    'release_date' => isset($track['album']['release_date']) ? (new DateTime($track['album']['release_date']))->format('Y-m-d') : null,
                ]
            );
        }

        return self::SUCCESS;
    }
}
