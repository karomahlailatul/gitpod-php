<?php

namespace App\Http\Controllers;
use App\Models\CategoryCourse;
use Illuminate\Http\Request;

class CategoryCourseController extends Controller
{
    public function index()
    {
        $categories = CategoryCourse::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = CategoryCourse::create($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function show(CategoryCourse $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(CategoryCourse $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, CategoryCourse $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(CategoryCourse $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
