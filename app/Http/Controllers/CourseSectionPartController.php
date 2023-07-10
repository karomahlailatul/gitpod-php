<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use App\Models\CourseSectionPart;
use Illuminate\Http\Request;

class CourseSectionPartController extends Controller
{
    public function index()
    {
        $courseSectionParts = CourseSectionPart::all();
        return view('admin.course_section_parts.index', compact('courseSectionParts'));
    }

    public function create()
    {
        $courseSections = CourseSection::all();
        return view('admin.course_section_parts.create', compact('courseSections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'course_sections_id' => 'required|exists:course_sections,id',
        ]);

        $courseSectionPart = CourseSectionPart::create($validatedData);

        return redirect()->route('admin.course-section-parts.index')->with('success', 'Course section part created successfully.');
    }

    public function show(CourseSectionPart $courseSectionPart)
    {
        return view('admin.course_section_parts.show', compact('courseSectionPart'));
    }

    public function edit(CourseSectionPart $courseSectionPart)
    {
        $courseSections = CourseSection::all();
        return view('admin.course_section_parts.edit', compact('courseSectionPart', 'courseSections'));
    }

    public function update(Request $request, CourseSectionPart $courseSectionPart)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'course_sections_id' => 'required|exists:course_sections,id',
        ]);

        $courseSectionPart->update($validatedData);

        return redirect()->route('admin.course-section-parts.index')->with('success', 'Course section part updated successfully.');
    }

    public function destroy(CourseSectionPart $courseSectionPart)
    {
        $courseSectionPart->delete();

        return redirect()->route('admin.course-section-parts.index')->with('success', 'Course section part deleted successfully.');
    }
}
