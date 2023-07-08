<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    // public function create(Course $course)
    // {
    //     return view('admin.course-sections.create', compact('course'));
    // }

    // public function store(Request $request, Course $course)
    // {
    //     // Validate and save the course section data
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'description' => 'required',
    //     ]);

    //     $courseSection = $course->courseSections()->create($validatedData);

    //     return redirect()->route('admin.courses.show', $course);
    // }

    // public function show(Course $course, CourseSection $courseSection)
    // {
    //     return view('admin.course-sections.show', compact('course', 'courseSection'));
    // }

    // public function edit(Course $course, CourseSection $courseSection)
    // {
    //     return view('admin.course-sections.edit', compact('course', 'courseSection'));
    // }

    // public function update(Request $request, Course $course, CourseSection $courseSection)
    // {
    //     // Validate and update the course section data
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'description' => 'required',
    //     ]);

    //     $courseSection->update($validatedData);

    //     return redirect()->route('admin.courses.show', $course);
    // }

    // public function destroy(Course $course, CourseSection $courseSection)
    // {
    //     $courseSection->delete();
    //     return redirect()->route('admin.courses.show', $course);
    // }

    public function index()
    {
        $courseSections = CourseSection::all();
        return view('admin.course_sections.index', compact('courseSections'));
    }

    public function create()
    {
        return view('admin.course_sections.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'courses_id' => 'required|exists:courses,id',
        ]);

        $courseSection = CourseSection::create($validatedData);

        return redirect()->route('admin.course-sections.index')->with('success', 'Course section created successfully.');
    }

    public function show(CourseSection $courseSection)
    {
        return view('admin.course_sections.show', compact('courseSection'));
    }

    public function edit(CourseSection $courseSection)
    {
        return view('admin.course_sections.edit', compact('courseSection'));
    }

    public function update(Request $request, CourseSection $courseSection)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'courses_id' => 'required|exists:courses,id',
        ]);

        $courseSection->update($validatedData);

        return redirect()->route('admin.course-sections.index')->with('success', 'Course section updated successfully.');
    }

    public function destroy(CourseSection $courseSection)
    {
        $courseSection->delete();

        return redirect()->route('admin.course-sections.index')->with('success', 'Course section deleted successfully.');
    }
}
