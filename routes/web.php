<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// , config('jetstream.auth_session')
Route::middleware(['auth:sanctum', 'verified',])->group(function () {

    Route::get("/dashboard",[HomeController::class,'index'])->name('dashboard');
    Route::get("/users/export",[HomeController::class,'exportUsers'])->name('users');
    Route::get("/importantdates",[HomeController::class,'importantDates'])->name('important.dates');
    Route::get("/guidelines",[HomeController::class,'guidelines'])->name('guidelines');

    Route::get("/about",[AboutController::class,'index'])->name('about.index');

    Route::get("/events",[EventController::class,'index'])->name('events.index');
    Route::get("/events/{id}",[EventController::class,'show'])->name('events.show');
    Route::get("/events/{id}/register",[EventController::class,'create'])->name('events.create');
    Route::post("/events/{id}/register",[EventController::class,'store'])->name('events.store');

    Route::get("/courses",[CourseController::class,'index'])->name('courses.index');
    Route::get("/courses/{id}",[CourseController::class,'view'])->name('courses.view');
    Route::get("/course-details/{id}",[CourseController::class,'show'])->name('courses.show');
    Route::get("/course-details/{id}/enroll",[CourseController::class,'create'])->name('courses.create');
    Route::post("/course-details/{id}/enroll",[CourseController::class,'store'])->name('courses.store');

    Route::get("/contact",[ContactController::class,'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    Route::get("/trainers",[TrainerController::class,'index'])->name('trainers.index');
    Route::get("/trainer/{id}",[TrainerController::class,'show'])->name('trainers.show');
    Route::get("/studyMaterial",[TrainerController::class,'create'])->name('trainers.create');
    Route::post("/studyMaterial",[TrainerController::class,'store'])->name('trainers.store');
    Route::get("/studyMaterial/view",[HomeController::class,'show'])->name('studymaterials.show');

    Route::get("/categorys",[CategoryController::class,'index'])->name('categorys.index');
    Route::get("/categorys/{id}",[CategoryController::class,'show'])->name('categorys.show');

    // Route::get('/pricing', [PricingController::class,'index'])->name('pricing.index');

    // Route::get('/about', function () { return view('main.about'); })->name('about');
    // Route::get('/contact', function () { return view('main.contact'); })->name('contact');
    Route::get('/terms', [HomeController::class,'terms'])->name('terms');
    Route::get('/policy', [HomeController::class,'policy'])->name('policy');

    Route::get('/notify', [CourseController::class, 'sendNotification']);

    Route::get("/resources",[HomeController::class,'resources'])->name('resources');

    Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignment.index');
    Route::get('/assignments/add', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::post('/assignments/add', [AssignmentController::class, 'store'])->name('assignment.store');
    Route::get('/assignments/{id}', [AssignmentController::class, 'show'])->name('assignment.show');
    Route::get('/assignments/{id}/edit', [AssignmentController::class, 'edit'])->name('assignment.edit');
    Route::post('/assignments/{id}/edit', [AssignmentController::class, 'update'])->name('assignment.update');
    Route::delete('/assignments/{id}', [AssignmentController::class, 'destroy'])->name('assignment.destroy');
    Route::get('/assignments/{id}/add', [AssignmentController::class, 'addView'])->name('assignment.addView');
    Route::post('/assignments/{id}/add', [AssignmentController::class, 'add'])->name('assignment.add');
    Route::delete('/assignments/{id}/add', [AssignmentController::class, 'delete'])->name('assignment.delete');

    Route::post("/newsletter",[HomeController::class,'subscribe'])->name('newsletter.subscribe');
    Route::post("/newsletter/unsubscribe",[HomeController::class,'unsubscribe'])->name('newsletter.unsubscribe');

    
});

