<?php

namespace App\Http\Controllers;

use App\Course;
use App\ContentTitle;
use Illuminate\Http\Request;

class ContentTitleController extends Controller
{
    // Show the form to create a content title
    public function index()
{
    $contentTitles = ContentTitle::with('course')->paginate(10);  // Paginate content titles and load related course
    return view('content_titles.index', compact('contentTitles'));
}
    public function create()
    {
        // Fetch all courses
        $courses = Course::all();

        // Return the view with courses
        return view('content_titles.create', compact('courses'));
    }

    // Store the content title
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,course_id',
            'title' => 'required|string|max:255',
            'position' => 'required|integer',
        ]);

        // Create a new content title
        ContentTitle::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'position' => $request->position,
        ]);

        return redirect()->route('content_titles.create')->with('success', 'Content title created successfully!');
    }
}
