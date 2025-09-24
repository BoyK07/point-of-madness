<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use App\Models\Phrase;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $userCount = User::count();
        $mediaCount = Media::count();
        $linkCount = Link::count();
        $phraseCount = Phrase::count();
        $upcomingEvents = Event::withoutGlobalScope('upcoming')
            ->where(function ($query) {
                $query->whereNull('ends_at')->where('starts_at', '>=', Carbon::now())
                    ->orWhere('ends_at', '>=', Carbon::now());
            })
            ->count();

        return view('admin.dashboard', compact(
            'userCount',
            'mediaCount',
            'linkCount',
            'phraseCount',
            'upcomingEvents'
        ));
    }
}
