<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $events = ssot_events_upcoming()->take(3);
        $heroLinks = ssot_links('hero');

        return view('home', compact('events', 'heroLinks'));
    }
}
