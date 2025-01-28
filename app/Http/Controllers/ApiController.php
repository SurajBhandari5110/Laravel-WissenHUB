<?php

namespace App\Http\Controllers;

use App\Course;
use App\ContentTitle;
use App\Subheading;
use Illuminate\Http\Request;

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
}
