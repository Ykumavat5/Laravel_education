<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Assignment;
use App\Models\DivisionStandard;
use App\Models\StudentAssignment;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $assignments = Assignment::paginate(6);
        $user = auth()->user();

        if ($user->role == 'teacher') {
            $assignments = Assignment::paginate(6); // Retrieve all assignments for teachers
        } else {
            $assignments = Assignment::where('standard_division_id', $user->student->standard_division_id)->paginate(6); // Filter for students
        }

        return view('main.assignment.assignment', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisionStandardIds = DivisionStandard::with(['standard', 'division'])->get();
        return view('main.assignment.add', compact('divisionStandardIds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging the request data
        // dd($request->all());

        // Validation rules
        $request->validate([
            'standard_division_id' => 'required|string|exists:division_standard,id',
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duedate' => 'required|date',
            'time' => 'required|string'
        ]);

        // Create a new assignment
        $assignment = new Assignment();
        $teacher = auth()->user()->teacher;
        $assignment->teacher_id = $teacher ? $teacher->id : null;
        $assignment->standard_division_id = $request->standard_division_id;
        $assignment->title = $request->title;
        $assignment->subject = $request->subject;
        $assignment->description = $request->description;
        if ($request->image) {
            $path = $request->file('image')->store('images');
            $publicPath = Storage::url($path);
            $assignment->image = $request->$publicPath;
        }
        $assignment->due_date = $request->duedate . ' ' . $request->time;
        $assignment->save();

        return redirect()->route('assignment.index')->with('success', 'Assignment created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the assignment details
        $assignment = Assignment::findOrFail($id);

        // Check if the logged-in student has submitted the assignment
        $studentId = Auth::id();
        $submission = StudentAssignment::where('assignment_id', $assignment->id)
            ->where('student_id', $studentId)
            ->first();

        return view('main.assignment.view', compact('assignment', 'submission'));
    }


    public function addview($id)
    {
        $assignment = Assignment::findorFail($id);
        return view('main.assignment.addAssignment', compact('assignment'));
    }

    public function add(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,png,jpg,jpeg,gif,txt|max:2048'
        ]);
        $assignment = Assignment::findorFail($id);
        $student_assignment = new StudentAssignment();
        $student_assignment->assignment_id = $id;
        $student_assignment->student_id = auth()->user()->student->id;

        // if ($request->file('file')->isValid()) {
        //     $filePath = $request->file('file')->store('uploads/assignments', 'public');
        //     $path = Storage::url($filePath);
        //     $student_assignment->file = $path;
        // }

        if ($request->file('file')->isValid()) {
            $originalName = $request->file('file')->getClientOriginalName();

            $extension = pathinfo($originalName, PATHINFO_EXTENSION);

            $newFileName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;

            $filePath = $request->file('file')->storeAs('uploads/assignments', $newFileName, 'public');

            $path = Storage::url($filePath);
            $student_assignment->file = $path;
        }

        if ($assignment->due_date < now()) {
            $student_assignment->status = 'submitted';
        } else {
            $student_assignment->status = 'late';
        }

        $student_assignment->save();

        return redirect()->route('assignment.show', $id)->with('success', 'Assignment added successfully');
    }

    public function delete($id)
    {
        $assignment = Assignment::findOrFail($id);

        $assignment->delete(); 

        return redirect()->route('assignment.show',$id)->with('success', 'Assignment deleted successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $divisionStandardIds = DivisionStandard::with(['standard', 'division'])->get();
        $assignment = Assignment::where('id', $id)->first(); // Filter for students
        // dd($assignment);
        return view('main.assignment.edit', compact('assignment', 'divisionStandardIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'standard_division_id' => 'required|string|exists:division_standard,id',
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duedate' => 'required|date',
            'time' => 'required|string'
        ]);

        // Create a new assignment
        $assignment = Assignment::findorFail($id);
        $teacher = auth()->user()->teacher;
        $assignment->teacher_id = $teacher ? $teacher->id : null;
        $assignment->standard_division_id = $request->standard_division_id;
        $assignment->title = $request->title;
        $assignment->subject = $request->subject;
        $assignment->description = $request->description;
        if ($request->image) {
            $path = $request->file('image')->store('images');
            $publicPath = Storage::url($path);
            $assignment->image = $request->$publicPath;
        }
        $assignment->due_date = $request->duedate . ' ' . $request->time;
        $assignment->save();

        return redirect()->route('assignment.index')->with('success', 'Assignment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $assignment = Assignment::findorFail($id);
        $assignment->delete();
        return redirect()->back()->with('success', 'Assignment deleted successfully.');
    }
}
