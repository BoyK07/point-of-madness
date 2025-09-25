<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Models\Event;
use App\Models\Link;
use App\Models\Media;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::with(['media', 'link'])->orderByDesc('starts_at')->paginate(20),
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
