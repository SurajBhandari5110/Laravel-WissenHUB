<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;
use App\Category;
use App\Course;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the course categories.
     */
    public function index()
    {
        $courseCategories = CourseCategory::with(['course', 'category'])->get();
        return view('course_categories.index', compact('courseCategories'));
    }

    /**
     * Show the form for creating a new course category.
     */
    public function create()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('course_categories.create', compact('courses', 'categories'));
    }

    /**
     * Store a newly created course category in the database.
     */
    public function store(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,course_id',
        'category_id' => 'required|exists:categories,category_id',
    ]);

    CourseCategory::create([
        'course_id' => $request->input('course_id'),
        'category_id' => $request->input('category_id'),
    ]);

    return redirect()->route('course_categories.index')->with('success', 'Category assigned to course successfully.');
}

    /**
     * Show the form for editing the specified course category.
     */
    public function edit($id)
    {
        $courseCategory = CourseCategory::findOrFail($id);
        $courses = Course::all();
        $categories = Category::all();

        return view('course_categories.edit', compact('courseCategory', 'courses', 'categories'));
    }

    /**
     * Update the specified course category in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $courseCategory = CourseCategory::findOrFail($id);
        $courseCategory->update([
            'course_id' => $request->course_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('course_categories.index')->with('success', 'Course category updated successfully.');
    }

    /**
     * Remove the specified course category from the database.
     */
    public function destroy($id)
    {
        $courseCategory = CourseCategory::findOrFail($id);
        $courseCategory->delete();

        return redirect()->route('course_categories.index')->with('success', 'Course category deleted successfully.');
    }
    
}
