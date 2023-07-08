<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use App\Models\CourseSectionPart;
use Illuminate\Http\Request;

class CourseSectionPartController extends Controller
{
    // public function create(CourseSection $courseSection)
    // {
    //     return view('admin.course-section-parts.create', compact('courseSection'));
    // }

    // public function store(Request $request, CourseSection $courseSection)
    // {
    //     // Validate and save the course section part data
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'description' => 'required',
    //     ]);

    //     $courseSectionPart = $courseSection->courseSectionParts()->create($validatedData);

    //     return redirect()->route('admin.course-sections.show', [$courseSection]);
    // }

    // public function show(CourseSection $courseSection, CourseSectionPart $courseSectionPart)
    // {
    //     return view('admin.course-section-parts.show', compact('courseSection', 'courseSectionPart'));
    // }

    // public function edit(CourseSection $courseSection, CourseSectionPart $courseSectionPart)
    // {
    //     return view('admin.course-section-parts.edit', compact('courseSection', 'courseSectionPart'));
    // }

    // public function update(Request $request, CourseSection $courseSection, CourseSectionPart $courseSectionPart)
    // {
    //     // Validate and update the course section part data
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'description' => 'required',
    //     ]);

    //     $courseSectionPart->update($validatedData);

    //     return redirect()->route('admin.course-sections.show', [$courseSection]);
    // }

    // public function destroy(CourseSection $courseSection, CourseSectionPart $courseSectionPart)
    // {
    //     $courseSectionPart->delete();
    //     return redirect()->route('admin.course-sections.show', [$courseSection]);
    // }


    public function index()
    {
        $courseSectionParts = CourseSectionPart::all();
        return view('admin.course_section_parts.index', compact('courseSectionParts'));
    }

    public function create()
    {
        return view('admin.course_section_parts.create');
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
        return view('admin.course_section_parts.edit', compact('courseSectionPart'));
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
