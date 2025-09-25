<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use App\Models\Phrase;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'mediaCount' => Media::count(),
            'linkCount' => Link::count(),
            'eventCount' => Event::count(),
            'phraseCount' => Phrase::count(),
        ]);
    }
}
