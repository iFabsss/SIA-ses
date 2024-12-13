<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\{
    Courses,
    programs,
    student,
    EnrolledCourses,
    EnrolledSections,
    Sections
};
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect('login')->with('error', 'Please log in first.');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $programs = programs::all();


        $studentInfo = student::where('accID', $user->id)->first();
        $availableCourses = null;

        if ($studentInfo) {
            $availableCourses = Courses::where('program', $studentInfo->program)->get();
        }

        return view('dashboard', compact('user', 'programs', 'studentInfo', 'availableCourses'))->with('userID', $user->id);
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
     * Display the specified resource.
     */
    public function show(string $id)
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
