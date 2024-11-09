<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\StudyMaterial;
use Illuminate\Support\Facades\Storage;
use App\Models\DivisionStandard;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Teacher::with('user')->paginate(6);
        return view(
            'main.trainer.trainers',
            compact('trainers')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisionStandardIds = DivisionStandard::with(['standard', 'division'])->get();
        return view('main.studyMaterial.studyMaterial',compact('divisionStandardIds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'standard_division_id'=>'required|string|exists:division_standard,id',
            'file'=>'required|mimes:jpg,jpeg,png,gif,pdf,mp4,max:4096',
            'title'=>'required|string|max:255'
        ]);
        
        $studyMaterial = new StudyMaterial();
        $studyMaterial->standard_division_id=$request->standard_division_id;
        $studyMaterial->teacher_id = auth()->user()->id;

        if ($request->file('file')->isValid()) {
            $originalName = $request->file('file')->getClientOriginalName();
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newFileName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
            $filePath = $request->file('file')->storeAs('uploads/studymaterials', $newFileName, 'public');
            $path = Storage::url($filePath);
            $studyMaterial->file = $path;
        }
        $studyMaterial->description=$request->description;
        $studyMaterial->title=$request->title;
        $studyMaterial->save();

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $trainer = Teacher::with('user')->findOrFail($id);
        return view('main.trainer.view', compact('trainer'));
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
