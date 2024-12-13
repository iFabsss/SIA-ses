<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\{
    Courses,
    Professors,
    programs,
    student,
    Sections,
    EnrolledCourses,
    EnrolledSections
};


class ProfileController extends Controller
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
        $enrolledCourses = EnrolledCourses::where('studentID', $user->id)->get()->pluck('courseID')->toArray();
        $enrolledSections = EnrolledSections::where('studentID', $user->id)->get();

        if ($studentInfo) {
            $availableCourses = Courses::where('program', $studentInfo->program)->with('sections')->get();
        }
        return view('profile', compact('user', 'programs', 'studentInfo', 'availableCourses', 'enrolledCourses', 'enrolledSections'));
    }

    public function viewSections($courseID)
    {
        $sections = Sections::where('courseID', $courseID)->with('professor')->get();

        return response()->json($sections);
    }

    public function enroll(Request $request)
    {
        $validated = $request->validate([
            'registeredCourses' => 'required|array',
            'registeredSections' => 'required|array',
        ]);

        $user = Auth::user();

        $studentID = student::where('accID', $user->id)->first()->id;

        foreach ($validated['registeredCourses'] as $index => $courseID) {
            $sectionID = $validated['registeredSections'][$index];

            // Check if the student is already enrolled in the course
            $courseExists = EnrolledCourses::where('studentID', $studentID)
                ->where('courseID', $courseID)
                ->exists();


            if (!$courseExists) {
                // Insert into EnrolledCourses
                EnrolledCourses::create([
                    'studentID' => $studentID,
                    'courseID' => $courseID,
                ]);
            }
            // Check if the section exists for this student and course
            $existingSection = EnrolledSections::where('studentID', $studentID)
                ->where('courseID', $courseID)
                ->first();

            if ($existingSection) {
                $existingSection->update([
                    'sectionID' => $sectionID,
                ]);
            } else {
                $selectedSections = $validated['registeredSections'];
                foreach ($selectedSections as $selectedSectionID) {
                    $selectedSection = Sections::find($selectedSectionID);

                    if ($selectedSection) {
                        $selectedSectionSched = $selectedSection->schedule; // Assuming schedule is a JSON-encoded string

                        // Check for schedule conflicts
                        $conflictExists = $this->hasScheduleConflict($studentID, $courseID, $selectedSectionSched);
                        if ($conflictExists) {
                            return redirect()->route('profile')->with('error', 'Schedule conflict detected. Please select a different section.');
                        }
                    }
                }
                try {
                    EnrolledSections::create([
                        'studentID' => $studentID,
                        'sectionID' => $sectionID,
                        'courseID' => $courseID,
                    ]);
                } catch (\Exception $e) {
                    return redirect()->route('profile')->with('error', 'Please pick a course!');
                }
            }
        }
        return redirect()->route('profile')->with('success', 'Enrollment successful.');
    }

    private function hasScheduleConflict($studentID, $courseID, $newSchedule)
    {
        $enrolledSections = EnrolledSections::where('studentID', $studentID)
            ->where('courseID', $courseID)
            ->get();

        foreach ($enrolledSections as $section) {
            $enrolledSchedule = json_decode($section->section->schedule, true); // Assuming schedule is stored in JSON format

            // Check for overlapping schedule
            if (
                $enrolledSchedule['days'] === $newSchedule['days'] &&
                (
                    ($newSchedule['startTime'] >= $enrolledSchedule['startTime'] && $newSchedule['startTime'] < $enrolledSchedule['endTime']) ||
                    ($newSchedule['endTime'] > $enrolledSchedule['startTime'] && $newSchedule['endTime'] <= $enrolledSchedule['endTime'])
                )
            ) {
                return true; // Conflict exists
            }
        }

        return false; // No conflict
    }
}
