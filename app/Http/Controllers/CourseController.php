<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\Event;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Enrollment;
use App\Models\Fee;
use Carbon\Carbon;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('categories')->paginate(3);
        $trainers = Teacher::with('user')->limit(3)->get();
        $currentDate = Carbon::now();

        // $enrollments = Enrollment::with('course', 'user')
        //     ->whereNotNull('ends_at')
        //     ->where('ends_at','>',$currentDate)
        //     ->get();
        // foreach ($enrollments as $enrollment) {
        //     echo ($enrollment->user->user);
        //     echo ($enrollment->course);
        // }
        // dd($enrollments);
        return view('main.course.courses', compact('courses', 'trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $categories = Category::with('subCategories')->whereNull('parent_id')->take(5)->get();
        $course = Course::findorFail($id);

        $isEnrolled = Enrollment::where('student_id', auth()->id())->where('course_id', $id)->exists();

        if ($isEnrolled) {
            return redirect()->route('courses.view', $id);
        }
        return view(
            'main.course.enrollment',
            compact(

                'categories',
                'course',
                'id'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|email|exists:users,email', 
    //     'country_code' => 'required|string|min:2|max:5|regex:/^\+\d{1,4}$/',
    //     'phone_number' => 'required|string|regex:/^[0-9]{8,15}$/', 
    // ]);
    //   'country_code' => 'required|string|min:2|max:5|regex:/^\+\d{1,4}$/',
    //   'phone_number' => 'required|string|regex:/^[0-9]{8,15}$/', 
    //  [
    //     'name.required' => 'The name is required.',
    //     'email.required' => 'The email is required.',
    //     'email.email' => 'The email must be a valid email address.',
    //     'email.exists' => 'The provided email does not exist in our records.',
    //     'country_code.required' => 'The country code is required.',
    //     'country_code.min' => 'The country code must be at least 2 characters.',
    //     'country_code.max' => 'The country code must not exceed 5 characters.',
    //     'country_code.regex' => 'The country code must start with "+" followed by 1 to 4 digits.',
    //     'phone_number.required' => 'The phone number is required.',
    //     'phone_number.regex' => 'The phone number must be between 8 and 15 digits.',
    // ]);


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|exists:users,email',
            'course_id' => 'required|exists:courses,id'
        ]);

        $courseId = $validatedData['course_id'];
        $user = User::where('email', $validatedData['email'])->first();
        $studentId = auth()->id();

        $course = Course::findOrFail($courseId);
        $isEnrolled = Enrollment::where('student_id', $studentId)->where('course_id', $courseId)->exists();

        if ($isEnrolled) {
            return redirect()->route('courses.view', $courseId);
        }

        $enroll = new Enrollment();
        $enroll->student_id = $user->id;
        $enroll->course_id = $courseId;
        $enroll->enrollment_date = now();

        // Set enrollment duration based on course type
        if ($course->duration === 'monthly') {
            $enroll->ends_at = now()->addMonth();
        } elseif ($course->duration === 'yearly') {
            $enroll->ends_at = now()->addYear();
        } else {
            $enroll->ends_at = null;
        }
        $enroll->status = 'active';
        $enroll->save();

        // Handle fees if the course is not free
        if (!$course->is_free) {
            $fees = new Fee();
            $fees->student_id = $user->id;
            $fees->course_id = $courseId;
            $fees->amount = $course->price;
            $fees->payment_type = 'subscription';
            $fees->status = 'unpaid';
            $fees->save();

            return redirect()->route('courses.index')->with('success', 'Subscription added successfully.');
        }

        return redirect()->route('courses.index')->with('success', 'Successfully enrolled in the course!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $courses = Course::with('categories')->limit(3)->get();
        $course = Course::findorFail($id);
        $studentId = auth()->id();

        $isEnrolled = Enrollment::where('student_id', $studentId)
            ->where('course_id', $id)
            ->exists();
        return view(
            'main.course.courseDetails',
            compact('courses', 'course', 'isEnrolled')
        );
    }

    public function view(Request $request, $id)
    {
        $courses = Course::with('categories')->limit(3)->get();
        $course = Course::findorFail($id);
        $studentId = auth()->id();

        $isEnrolled = Enrollment::where('student_id', $studentId)
            ->where('course_id', $id)
            ->exists();
        if ($isEnrolled) {
            return view(
                'main.course.viewCourse',
                compact('courses', 'course', 'isEnrolled')
            );
        } else {
            return redirect()->route('courses.show', $id);
        }
    }

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

    public function sendNotification()
    {
        return back()->with('success', 'notification received successfully.');
    }
}
