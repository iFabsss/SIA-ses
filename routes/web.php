<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    DashboardController,
    ProfileController,
    StudentController,
    CoursesController,
    SectionsController
};
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('accform');
});

Route::get('/accform', function () {
    return view('accform');
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::post('/saveStudent', [StudentController::class, 'save'])->name('saveStudent');
Route::post('/enroll', [ProfileController::class, 'enroll'])->name('enroll');
Route::get('/courses/{courseID}/sections', [ProfileController::class, 'viewSections']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Logged out successfully!');
})->name('logout');
