<?php
namespace App\Http\Controllers;

use App\ContentTitle;
use App\Subheading;
use Illuminate\Http\Request;

class SubheadingController extends Controller
{
    public function index()
    {
        $contentTitle=ContentTitle::all();
        $subheadings = Subheading::all();

        // Return the view with the subheadings data
        return view('subheadings.index', compact('subheadings','contentTitle'));
        

    }
    public function create()
    {
        $contentTitles = ContentTitle::all();
       

        // Pass all content titles to the create view
        return view('subheadings.create', compact('contentTitles'));
    }

    // Store a new subheading
    public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'content_id' => 'required|exists:content_titles,content_id', // Validate content_id exists in content_titles table
        'title' => 'required|string|max:200',
    ]);

    // Create a new subheading
    Subheading::create([
        'content_id' => $request->content_id, // Store the content_id from the request
        'title' => $request->title,          // Store the title
    ]);

    // Redirect with a success message
    return redirect()->route('subheadings.index')->with('success', 'Subheading created successfully!');
}

}
