<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
use App\Http\Requests\EventRequestValidation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Event/Index', [
            'filter' => $request->all('upcoming', 'finished'),
            'events' => Event::orderByStartDate()
                ->filter($request->only('upcoming', 'finished'))
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
            'description' => $request->description
        ]);

        // redirect in event index page
        return to_route('index')->with('success', 'Event created.');
    }

    public function edit($id)
    {
        dd($id);
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return to_route('index')->with('success', 'Event deleted.');
    }
}
