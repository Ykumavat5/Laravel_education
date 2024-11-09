<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Student;
use App\Models\Course;
use App\Models\Event;
use App\Models\Teacher;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('categories', 'teacher')->limit(3)->get();
        $allCategories = Category::paginate(2);
        return view('main.category.category', compact('courses','allCategories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses = Course::with('categories', 'teacher')->limit(3)->get();
        $category = Category::with('courses')->find($id);

        return view('main.category.view', compact('courses', 'category'));
    }
    /**
     * Show the form for creating a new resource.
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
