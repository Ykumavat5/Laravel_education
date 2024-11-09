<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Student;
use App\Models\Course;
use App\Models\Event;
use App\Models\NewsLetter;
use App\Models\Teacher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $student_counts = Student::count();
            $course_counts = Course::count();
            $event_counts = Event::count();
            $trainer_counts = Teacher::count();
            $categories = Category::with('subCategories')->whereNull('parent_id')->take(5)->get();
            $newsletterExists = NewsLetter::where('user_id', auth()->id())->exists();

            $view->with([
                'categories' => $categories,
                'student_counts' =>  $student_counts,
                'course_counts' => $course_counts,
                'event_counts' => $event_counts,
                'trainer_counts' => $trainer_counts,
                'newsletterExists' => $newsletterExists
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
