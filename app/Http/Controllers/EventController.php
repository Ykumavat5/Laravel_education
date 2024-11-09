<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Event;
use App\Models\Category;
use App\Models\User;
use App\Models\EventEnrollment;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::limit(3)->get();
        // $trainers = Teacher::with('user')->limit(3)->get();
        return view('main.event.events',
        compact('events'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $event = Event::with('enrollments')->findOrFail($id);
        return view('main.event.register',
        compact('event','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $events = Event::with('enrollments')->findOrFail($id);
        $availableSpots = $events->availableSpots();
        return view('main.event.viewEvent',
        compact('events','availableSpots'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|exists:users,email',
            
        ]);
        $user = User::where('email',$request->email)->first();
        $event = new EventEnrollment();
        $event->student_id=$user->id;
        $event->event_id=$id;

        $event->save();
        return redirect()->route('events.show',$id)->with('success','You have successfully registered for this event');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
