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
                'Authorization' => 'Basic '.base64_encode($id.':'.$secret),
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
        $url = rtrim(config('spotify.api_base'), '/').'/'.ltrim($path, '/');
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

    public function getArtistTopTracks(string $artistId, ?string $market = null): array
    {
        return $this->get("artists/{$artistId}/top-tracks", [
            'market' => $market ?? config('spotify.market'),
        ]);
    }
}
