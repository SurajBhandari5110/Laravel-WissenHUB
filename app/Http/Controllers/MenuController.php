<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class MenuController extends Controller
{
    // Show all courses
    public function showCourses()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // Show content titles and subheadings for a specific course
    public function showContentTitles($course_id)
    {
        $course = Course::with(['contentTitles.subheadings'])
                        ->findOrFail($course_id);
        return view('courses.show', compact('course'));
    }
}
