<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\User; 
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('enrollments.index', compact('courses'));
    }

    public function enroll($course_id)
    {
        $user_id = Session::get('user_id');

        if (!$user_id) {
            return redirect('/login')->with('error', 'You must be logged in to enroll.');
        }

        $course = Course::find($course_id);
        if (!$course) {
            return redirect()->back()->with('error', 'The course does not exist');
        }


        $alreadyEnrolled = Enrollment::where('user_id', $user_id)
                                     ->where('course_id', $course_id)
                                     ->exists();

        if ($alreadyEnrolled) {
            return redirect()->back()->with('error', 'You are already registered in the course');
        }

        Enrollment::create([
            'user_id' => $user_id,
            'course_id' => $course_id,
        ]);

        return redirect()->back()->with('success', 'You have successfully registered for the course.');
    }


    public function unenroll($course_id)
    {
        $user_id = Session::get('user_id');

        if (!$user_id) {
            return redirect('/login')->with('error', 'You must be logged in first.');
        }

        $enrollment = Enrollment::where('user_id', $user_id)
                                ->where('course_id', $course_id)
                                ->first();

        if ($enrollment) {
            $enrollment->delete();
            return redirect()->back()->with('success', 'Course registration has been canceled.');
        }

        return redirect()->back()->with('error','You are not enrolled in this course');
    }


    public function myCourses()
    {
        $user_id = Session::get('user_id');

        if (!$user_id) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $enrollments = Enrollment::where('user_id', $user_id)->get();
        $courses = [];

        foreach ($enrollments as $enrollment) {
            $course = Course::find($enrollment->course_id);
            if ($course) {
                $courses[] = $course;
            }
        }

        return view('enrollments.my_courses', compact('courses'));
    }
}
