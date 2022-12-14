<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequestValidation;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Event/Index', [
            'filters' => $request->all('status'),
            'events' => Event::orderByStartDate() // scope for start date on asc order
                ->filter($request->only('status')) // scope for filter the data with value
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($event) => [
                    'id' => $event->id,
                    'title' => Str::ucfirst($event->title),
                    'description' => $event->description,
                    'start_date' => $event->start_date,
                    'end_date' => $event->end_date,
                    'status' => $event->status,
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Event/Create');
    }

    public function store(EventRequestValidation $request)
    {
        $request->validated();
        // create the event
        Event::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        // redirect in event index page
        return to_route('index')->with('success', 'Event created.');
    }

    public function edit(Event $event)
    {
        return Inertia::render('Event/Edit', [
            'event' => [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start_date' => $event->start_date,
                'end_date' => $event->end_date,
            ],
        ]);
    }

    public function update(EventRequestValidation $request, Event $event)
    {
        $request->validated();
        $event->update([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return to_route('index')->with('success', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return to_route('index')->with('success', 'Event deleted.');
    }
}
