<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
use App\Http\Requests\EventRequestValidation;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function index()
    {
        return Inertia::render('Event/Index',[
            'events' => Event::all(),
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

       // redirect in index page

       return to_route('index')->with('success', 'Event created.');
    }
}
