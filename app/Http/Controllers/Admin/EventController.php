<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        $query = Event::withoutGlobalScope('upcoming')->with(['media', 'link'])->orderByDesc('starts_at');

        if ($request->boolean('upcoming', true)) {
            $query->where(function ($q) {
                $q->whereNull('ends_at')->where('starts_at', '>=', now())
                    ->orWhere('ends_at', '>=', now());
            });
        }

        $events = $query->paginate(15)->withQueryString();

        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        $media = Media::query()->orderBy('purpose')->get();
        $links = Link::query()->orderBy('label')->get();

        return view('admin.events.create', compact('media', 'links'));
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Event::create($data);

        return redirect()->route('admin.events.index')->with('status', 'Event created successfully.');
    }

    public function edit(Event $event): View
    {
        $event->load(['media', 'link']);
        $media = Media::query()->orderBy('purpose')->get();
        $links = Link::query()->orderBy('label')->get();

        return view('admin.events.edit', compact('event', 'media', 'links'));
    }

    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $data = $request->validated();

        $event->update($data);

        return redirect()->route('admin.events.index')->with('status', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('status', 'Event deleted successfully.');
    }
}
