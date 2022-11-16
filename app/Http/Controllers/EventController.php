<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
use App\Http\Requests\EventRequestValidation;

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
    }
}
