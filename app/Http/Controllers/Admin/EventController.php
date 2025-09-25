<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q', ''));

        $query = Event::query()
            ->with(['media', 'link'])
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('title', 'like', "%{$search}%")
                      ->orWhere('location', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('starts_at');

        return view('admin.events.index', [
            'events' => $query->paginate(20)->withQueryString(),
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.events.create', [
            'mediaOptions' => Media::orderBy('purpose')->get(),
            'linkOptions' => Link::orderBy('label')->get(),
        ]);
    }

    public function store(StoreEventRequest $request)
    {
        Event::create($request->validated());

        return redirect()->route('admin.events.index')->with('status', 'Event opgeslagen.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'event' => $event->load(['media', 'link']),
            'mediaOptions' => Media::orderBy('purpose')->get(),
            'linkOptions' => Link::orderBy('label')->get(),
        ]);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return redirect()->route('admin.events.index')->with('status', 'Event bijgewerkt.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('status', 'Event verwijderd.');
    }
}
