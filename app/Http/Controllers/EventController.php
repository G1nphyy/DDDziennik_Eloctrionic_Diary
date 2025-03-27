<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\schools;
use App\Models\Post;

class EventController extends Controller
{
    public function index() : object
    {
        $events = Event::latest()->paginate(9);
        return view('info_events.index', compact('events'));
    }

    public function show($id) : object
    {
        $event = Event::findOrFail($id);
        return view('info_events.show', compact('event'));
    }

}
