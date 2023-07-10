<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    public function index()
    {
        $courseSections = CourseSection::all();
        return view('admin.course_sections.index', compact('courseSections'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.course_sections.create', compact('courses'));
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
        $courses = Course::all();
        return view('admin.course_sections.edit', compact('courseSection', 'courses'));
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
