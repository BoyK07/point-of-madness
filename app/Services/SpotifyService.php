<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SpotifyService
{
    public function getAppToken(): string
    {
        $key = config('spotify.cache_key');
        if ($t = Cache::get($key)) {
            return $t;
        }

        $id = config('spotify.client_id');
        $secret = config('spotify.client_secret');

        $res = Http::asForm()
            ->timeout(config('spotify.timeout'))
            ->withHeaders([
                'Authorization' => 'Basic ' . base64_encode($id . ':' . $secret),
            ])
            ->post(config('spotify.token_url'), [
                'grant_type' => 'client_credentials',
            ]);

        $res->throw();

        $json = $res->json();
        $token = $json['access_token'];
        $expiresIn = (int) ($json['expires_in'] ?? 3600);
        $buffer = (int) config('spotify.cache_buffer_seconds', 600);

        // cache for (expires - buffer); never negative, keep a floor of 60s just in case
        $ttl = max(60, $expiresIn - $buffer);
        Cache::put($key, $token, $ttl);

        return $token;
    }

    public function get(string $path, array $query = []): array
    {
        $url = rtrim(config('spotify.api_base'), '/') . '/' . ltrim($path, '/');
        $query = array_filter($query + ['market' => config('spotify.market')]);

        $token = $this->getAppToken();

        $request = fn() => Http::timeout(config('spotify.timeout'))
            ->withToken($token)
            ->get($url, $query);

        $response = $request();

        // Token just expired? Refresh once.
        if ($response->status() === 401) {
            $token = $this->getAppToken();
            $response = Http::timeout(config('spotify.timeout'))
                ->withToken($token)
                ->get($url, $query);
        }

        // Rate limited? Respect Retry-After and retry once.
        if ($response->status() === 429) {
            $retry = (int) ($response->header('Retry-After') ?? 1);
            usleep(($retry * 1000 + random_int(0, 250)) * 1000);
            $response = $request();
        }

        $response->throw();
        return $response->json();
    }

    // Methods
    public function getArtist(string $artistId): array
    {
        return $this->get("artists/{$artistId}");
    }

    public function getArtistAlbums(string $artistId, ?string $market = null): array
    {
        $limit = 50;
        $offset = 0;
        $allAlbums = [];

        while (true) {
            $page = $this->get(
                "artists/{$artistId}/albums",
                [
                    'market' => $market ?? config('spotify.market', 'US'),
                    'limit' => $limit,
                    'offset' => $offset,
                ]
            );

            $items = $page['items'] ?? [];
            if (!empty($items)) {
                $allAlbums = array_merge($allAlbums, $items);
            }

            if (empty($page['next'])) {
                break;
            }

            $offset += $limit;
        }

        return $allAlbums;
    }


    public function getArtistTracks(string $artistId, ?string $market = null): array
    {
        $limit = 50;
        $offset = 0;
        $allAlbums = [];
        $allTracks = [];

        while (true) {
            $page = $this->get(
                "artists/{$artistId}/albums",
                [
                    'market' => $market ?? config('spotify.market', 'US'),
                    'limit' => $limit,
                    'offset' => $offset,
                ]
            );

            $items = $page['items'] ?? [];
            if (!empty($items)) {
                $allAlbums = array_merge($allAlbums, $items);
            }

            if (empty($page['next'])) {
                break;
            }

            $offset += $limit;
        }

        foreach ($allAlbums as $album) {
            $albumTracks = [];
            $tLimit = 50;
            $tOffset = 0;

            while (true) {
                $tracksPage = $this->get("albums/{$album['id']}/tracks", [
                    'market' => $market ?? config('spotify.market', 'US'),
                    'limit' => $tLimit,
                    'offset' => $tOffset,
                ]);

                $items = $tracksPage['items'] ?? [];
                if (!empty($items)) {
                    $albumTracks = array_merge($albumTracks, $items);
                }

                if (empty($tracksPage['next'])) {
                    break;
                }

                $tOffset += $tLimit;
            }

            if (!empty($albumTracks)) {
                $allTracks = array_merge($allTracks, $albumTracks);
            }
        }

        $trackChunks = array_chunk($allTracks, 50);
        $allTracks = [];
        foreach ($trackChunks as $trackChunk) {
            $tracks = $this->get("tracks", [
                'ids' => implode(',', array_column($trackChunk, 'id')),
            ]);
            $allTracks = array_merge($allTracks, $tracks['tracks']);
        }

        return $allTracks;
    }
}
