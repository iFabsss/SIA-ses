<?php

namespace App\Http\Controllers;

use App\Models\{
    student,
    programs,
    Courses,
    Sections,
    Professors,
    EnrolledCourses,
    EnrolledSections
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function save(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'middle-name' => 'nullable|string|max:255',
            'last-name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:1',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'contact-number' => 'required|string|max:15',
            'email' => 'required|email|unique:students,email',
            'course-year' => 'required|integer|min:1|max:6',
            'program' => 'required|string',
        ]);

        // Save the validated data into the database
        try {
            $userID = Auth::user()->id;
            $student = new Student([
                'accID' => $userID,
                'firstName' => $validated['first-name'],
                'middleName' => $validated['middle-name'],
                'lastName' => $validated['last-name'],
                'gender' => $validated['gender'],
                'age' => $validated['age'],
                'birthdate' => $validated['birthdate'],
                'address' => $validated['address'],
                'contactNumber' => $validated['contact-number'],
                'email' => $validated['email'],
                'courseYear' => $validated['course-year'],
                'program' => $validated['program'],
            ]);
            $student->save();

            return redirect('/profile')->with('success', 'Student profile saved successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to save the profile: ' . $e->getMessage()]);
        }
    }
    /**
     * Display API listing of the resource.
     */
    public function index($studentID)
    {
        $student = student::with(['enrolledCourses.course.enrolledSections.section.professor'])->where('id', $studentID)->first();

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $data = [
            'student' => $student
        ];
        return response()->json($student, 200);
    }
}
