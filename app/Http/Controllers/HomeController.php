<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $artists = Artist::all();
        $artist = $artists->first();

        $tracks = Track::where('artist_id', $artist->id)->get();
        $latestTrack = Track::where('artist_id', $artist->id)->orderBy('release_date', 'desc')->first();
        $latestAlbum = Album::where('artist_id', $artist->id)->orderBy('release_date', 'desc')->first();

        $latestRelease = $latestTrack;
        if ($latestAlbum && (!$latestTrack || $latestAlbum->release_date?->gt($latestTrack->release_date))) {
            $latestRelease = $latestAlbum;
        }

        $popularTracks = Track::where('artist_id', $artist->id)
            ->orderByDesc('playcount')
            ->orderByDesc('release_date')
            ->take(4)
            ->get();

        return view('index', compact('artist', 'latestRelease', 'popularTracks'));
    }
}
