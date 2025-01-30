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
    // public function showContentTitles($course_id)
    // {
    //     $categories = Category::with('courses')->get(); 
    //     $course = Course::with(['contentTitles.subheadings'])
    //                     ->findOrFail($course_id);
    //     return view('courses-frontend.show', compact('course'));
    // }
    public function showContentTitles($course_id)
    {
        // Get the categories related to the current course
        $categoryIds = CourseCategory::where('course_id', $course_id)->pluck('category_id');

        // Get all courses that belong to these categories
        $relatedCourses = Course::whereIn('course_id', function ($query) use ($categoryIds) {
            $query->select('course_id')
                ->from('course_categories')
                ->whereIn('category_id', $categoryIds);
        })->get();
        

        // Get the specific course details
        $course = Course::with(['contentTitles.subheadings'])
            ->findOrFail($course_id);

        return view('courses-frontend.show', compact('course', 'relatedCourses'));
    }
    
}
