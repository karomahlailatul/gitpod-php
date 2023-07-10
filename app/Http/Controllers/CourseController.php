<?php

namespace App\Http\Controllers;

use App\Models\CategoryCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = CategoryCourse::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|integer',
            'category_courses_id' => 'required|exists:category_courses,id',
            'active' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $validatedData['active'] = $request->has('active');

        $course = Course::create($validatedData);
        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = CategoryCourse::all();
        return view('admin.courses.edit', compact('categories', 'course'));
    }

    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'sometimes|image',
            'price' => 'required|integer',
            'category_courses_id' => 'required|exists:category_courses,id',
            'active' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image file
            Storage::disk('public')->delete($course->image);

            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $validatedData['active'] = $request->has('active');

        $course->update($validatedData);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        // Delete the image file
        Storage::disk('public')->delete($course->image);

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
