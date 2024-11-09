<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\Policy;
use App\Models\NewsLetter;
use App\Models\StudyMaterial;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * user
     * students
     * teachers
     * extracurricular_activities
     * activity_enrollments
     * course
     * course_assignments [category , course_category]
     * enrollment 
     * attendance
     * exams 
     * results
     * evaluations
     * notifications
     * fees
     * library_items
     * library_transactions
     * 
     * assignments
     * assignment submissions
     * lessons
     * payments
     * student_assignments
     * subscriptions
     * 
     */
    public function index()
    {
        $courses = Course::with('categories', 'teacher')->limit(3)->get();
        $trainers = Teacher::with('user')->limit(3)->get();
        return view('main.index', compact('courses', 'trainers'));
    }

    public function importantDates()
    {
        return view('main.important_dates');
    }

    public function guidelines()
    {
        return view('main.guidelines');
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();
        if ($user->role == 'teacher') {
            // echo($user->teacher->id);
            $materials = StudyMaterial::where('teacher_id',$user->id)->get();
            // dd($materials);

        } else {

            $materials = StudyMaterial::where("standard_division_id", $user->id)->get();
        }
        return view('main.studyMaterial.view',compact('materials'));
    }

    public function exportUsers()
    {
        // dd("Fsd");
        return Excel::download(new UsersExport, 'users.xlsx');
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

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $newsletter = new NewsLetter();
        $newsletter->user_id = auth()->id();
        $newsletter->email = $request->email;
        $newsletter->save();
        return back()->with('success', 'You have successfully subscribed to our newsletter.');
    }

    public function unsubscribe()
    {
        $newsletter = NewsLetter::where('user_id', auth()->id())->first();

        if ($newsletter) {
            $newsletter->delete();
            return back()->with('success', 'You have successfully unsubscribed from our newsletter.');
        } else {
            return back()->with('error', 'You are not subscribed to our newsletter.');
        }
    }


    public function terms()
    {
        $terms = Term::orderBy('created_at', 'desc')->first();
        return view('terms', compact('terms'));
    }

    public function policy()
    {
        $policy = Policy::orderBy('created_at', 'desc')->first();
        return view('policy', compact('policy'));
    }
    public function resources()
    {

        return view('main.resources');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
