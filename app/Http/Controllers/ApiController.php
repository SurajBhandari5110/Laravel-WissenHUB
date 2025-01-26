<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class ApiController extends Controller
{
    // Fetch all courses
    public function getCourses()
    {
        return response()->json(Course::all());
    }

    // Fetch content titles and subheadings for a specific course
    public function getCourseContent($course_id)
    {
        $course = Course::with('contentTitles.subheadings')->findOrFail($course_id);
        return response()->json($course);
    }
}
