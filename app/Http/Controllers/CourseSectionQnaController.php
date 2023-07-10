<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use App\Models\CourseSectionQna;
use Illuminate\Http\Request;

class CourseSectionQnaController extends Controller
{
    public function index()
    {
        $courseSectionQnas = CourseSectionQna::all();
        return view('admin.course_section_qnas.index', compact('courseSectionQnas'));
    }

    public function create()
    {
        $courseSections = CourseSection::all();
        return view('admin.course_section_qnas.create', compact('courseSections'));
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
        $courseSections = CourseSection::all();
        return view('admin.course_section_qnas.edit', compact('courseSectionQna', 'courseSections'));
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
