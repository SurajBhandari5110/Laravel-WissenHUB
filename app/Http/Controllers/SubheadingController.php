<?php
namespace App\Http\Controllers;

use App\ContentTitle;
use App\Subheading;
use App\Course;
use Illuminate\Http\Request;

class SubheadingController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $contentTitle = ContentTitle::all();
        $subheadings = Subheading::all();

        // Return the view with the subheadings data
        return view('subheadings.index', compact('subheadings', 'contentTitle','courses'));
    }

    public function create()
    {
        $courses = Course::all();
        
        $contentTitles = ContentTitle::all();

        // Pass all content titles to the create view
        return view('subheadings.create', compact('contentTitles','courses'));
    }
    public function getContentTitlesByCourse($courseId)
{
    // Fetch contentTitles based on the course_id
    $contentTitles = ContentTitle::where('course_id', $courseId)->get();

    // Return as JSON response
    return response()->json($contentTitles);
}

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'content_id' => 'required|exists:content_titles,content_id', // Validate content_id exists in content_titles table
            'title' => 'required|string|max:200',
            'content' => 'nullable',
        ]);

        // Create a new subheading
        Subheading::create([
            'content_id' => $request->content_id, // Store the content_id from the request
            'title' => $request->title,
            'content' => $request->content,
            
        ]);
        //dd($request->all());

        // Redirect with a success message
        return redirect()->route('subheadings.index')->with('success', 'Subheading created successfully!');
    }

    public function edit($id)
    {
        $subheading = Subheading::findOrFail($id);
        $contentTitles = ContentTitle::all();

        return view('subheadings.edit', compact('subheading', 'contentTitles'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'content_id' => 'required|exists:content_titles,content_id', // Validate content_id exists in content_titles table
            'title' => 'required|string|max:200',
            'content' => 'required|string',
        ]);

        // Find and update the subheading
        $subheading = Subheading::findOrFail($id);
        $subheading->update([
            'content_id' => $request->content_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('subheadings.index')->with('success', 'Subheading updated successfully!');
    }

    public function destroy($id)
    {
        // Find and delete the subheading
        $subheading = Subheading::findOrFail($id);
        $subheading->delete();

        return redirect()->route('subheadings.index')->with('success', 'Subheading deleted successfully!');
    }

    public function show($id)
    {
        $subheading = Subheading::findOrFail($id);

        return view('subheadings.show', compact('subheading'));
    }
}
