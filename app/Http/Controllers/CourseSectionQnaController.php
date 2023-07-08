<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use App\Models\CourseSectionQna;
use Illuminate\Http\Request;

class CourseSectionQnaController extends Controller
{
    // public function create(CourseSection $courseSection)
    // {
    //     return view('admin.course-section-qnas.create', compact('courseSection'));
    // }

    // public function store(Request $request, CourseSection $courseSection)
    // {
    //     // Validate and save the course section Q&A data
    //     $validatedData = $request->validate([
    //         'question' => 'required',
    //         'answer' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $courseSectionQna = $courseSection->courseSectionQnas()->create($validatedData);

    //     return redirect()->route('admin.course-sections.show', [$courseSection]);
    // }

    // public function show(CourseSection $courseSection, CourseSectionQna $courseSectionQna)
    // {
    //     return view('admin.course-section-qnas.show', compact('courseSection', 'courseSectionQna'));
    // }

    // public function edit(CourseSection $courseSection, CourseSectionQna $courseSectionQna)
    // {
    //     return view('admin.course-section-qnas.edit', compact('courseSection', 'courseSectionQna'));
    // }

    // public function update(Request $request, CourseSection $courseSection, CourseSectionQna $courseSectionQna)
    // {
    //     // Validate and update the course section Q&A data
    //     $validatedData = $request->validate([
    //         'question' => 'required',
    //         'answer' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $courseSectionQna->update($validatedData);

    //     return redirect()->route('admin.course-sections.show', [$courseSection]);
    // }

    // public function destroy(CourseSection $courseSection, CourseSectionQna $courseSectionQna)
    // {
    //     $courseSectionQna->delete();
    //     return redirect()->route('admin.course-sections.show', [$courseSection]);
    // }
    public function index()
    {
        $courseSectionQnas = CourseSectionQna::all();
        return view('admin.course_section_qnas.index', compact('courseSectionQnas'));
    }

    public function create()
    {
        return view('admin.course_section_qnas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'description' => 'required|string',
            'course_sections_id' => 'required|exists:course_sections,id',
        ]);

        $courseSectionQna = CourseSectionQna::create($validatedData);

        return redirect()->route('admin.course-section-qnas.index')->with('success', 'Course section Q&A created successfully.');
    }

    public function show(CourseSectionQna $courseSectionQna)
    {
        return view('admin.course_section_qnas.show', compact('courseSectionQna'));
    }

    public function edit(CourseSectionQna $courseSectionQna)
    {
        return view('admin.course_section_qnas.edit', compact('courseSectionQna'));
    }

    public function update(Request $request, CourseSectionQna $courseSectionQna)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'description' => 'required|string',
            'course_sections_id' => 'required|exists:course_sections,id',
        ]);

        $courseSectionQna->update($validatedData);

        return redirect()->route('admin.course-section-qnas.index')->with('success', 'Course section Q&A updated successfully.');
    }

    public function destroy(CourseSectionQna $courseSectionQna)
    {
        $courseSectionQna->delete();

        return redirect()->route('admin.course-section-qnas.index')->with('success', 'Course section Q&A deleted successfully.');
    }
}
