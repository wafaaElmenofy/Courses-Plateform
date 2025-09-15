<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Display all courses for the instructor
    public function index()
    {
        $user_id = session('user_id'); // get current instructor id from session
        $courses = Course::where('instructor_id', $user_id)->get();
        return view('courses.index', compact('courses'));
    }

    // Show form to create a new course
    public function create()
    {
        return view('courses.create');
    }

    // Store a new course
    public function store(Request $request)
    {
        $user_id = session('user_id');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'max_students' => 'required|integer',
        ]);

        // Create course linked to current instructor
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'max_students' => $request->max_students,
            'instructor_id' => $user_id
        ]);

        return redirect()->route('courses.index');
    }

    // Show form to edit a course
    public function edit(Course $course)
    {
        $this->authorizeCourse($course);
        return view('courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $this->authorizeCourse($course);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'max_students' => 'required|integer',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'max_students' => $request->max_students
        ]);

        return redirect()->route('courses.index');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $this->authorizeCourse($course);
        $course->delete();

        return redirect()->route('courses.index');
    }

    // Ensure instructor can only manage their own courses
    private function authorizeCourse(Course $course)
    {
        $user_id = session('user_id');
        if ($course->instructor_id != $user_id) {
            abort(403, 'Not allowed');
        }
    }
}
