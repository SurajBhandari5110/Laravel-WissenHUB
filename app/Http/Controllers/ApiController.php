<?php

namespace App\Http\Controllers;

use App\Course;
use App\ContentTitle;
use App\Subheading;
use Illuminate\Http\Request;
use App\CourseCategory;

class ApiController extends Controller
{
    // Fetch all courses
    public function getCourses()
    {
        $courses = Course::all();
        
        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }

    // Fetch content titles by course ID
    public function getContentTitlesByCourse($courseId)
    {
        $contentTitles = ContentTitle::where('course_id', $courseId)->get();

        if ($contentTitles->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No content titles found for this course.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $contentTitles
        ]);
    }

    // Fetch subheadings by content title ID
    public function getSubheadingsByContentTitle($contentId)
    {
        $subheadings = Subheading::where('content_id', $contentId)->get();

        if ($subheadings->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No subheadings found for this content title.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $subheadings
        ]);
    }

    // Fetch specific subheading content
    public function getSubheadingContent($subheadingId)
    {
        $subheading = Subheading::find($subheadingId);

        if (!$subheading) {
            return response()->json([
                'success' => false,
                'message' => 'Subheading not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'title' => $subheading->title,
                'content' => $subheading->content
            ]
        ]);
    }
    public function getcategory()
    {
        $categories = CourseCategory::with(['course', 'category'])->get();
        
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }
    public function getcategories($courseId)
    {
        // Get the categories related to the current course
        $categoryIds = CourseCategory::where('course_id', $courseId)->pluck('category_id');

        // Get all courses that belong to these categories
        $relatedCourses = Course::whereIn('course_id', function ($query) use ($categoryIds) {
            $query->select('course_id')
                ->from('course_categories')
                ->whereIn('category_id', $categoryIds);
        })->get();
        return response()->json([
            'success' => true,
            'data' => $relatedCourses
        ]);
    }
}
