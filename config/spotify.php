<?php

return [
    'client_id'  => env('SPOTIFY_CLIENT_ID'),
    'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
    'token_url'  => 'https://accounts.spotify.com/api/token',
    'api_base'   => 'https://api.spotify.com/v1/',
    'market'     => env('SPOTIFY_MARKET', 'US'),
    'timeout'    => (int) env('SPOTIFY_HTTP_TIMEOUT', 12),

    // Cache key + buffer (seconds). 10 minutes = 600s.
    'cache_key'  => 'spotify_app_token',
    'cache_buffer_seconds' => 600,
];
