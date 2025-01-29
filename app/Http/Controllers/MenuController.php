<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseCategory;
use App\Category;

class MenuController extends Controller
{
    // Show all courses
    public function showCourses()
    {
        $categories = Category::with('courses')->get(); 
        $courses = Course::all();
        return view('courses-frontend.index', compact('courses','categories'));
    }

    // Show content titles and subheadings for a specific course
    public function showContentTitles($course_id)
    {
        $course = Course::with(['contentTitles.subheadings'])
                        ->findOrFail($course_id);
        return view('courses-frontend.show', compact('course'));
    }
    
}
