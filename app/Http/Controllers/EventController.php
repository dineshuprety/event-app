<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        dd('i am here');
    }

    public function create()
    {
       return Inertia::render('Event/Create');
    }
}
