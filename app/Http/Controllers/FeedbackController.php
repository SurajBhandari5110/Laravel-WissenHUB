<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller {
    // Fetch all feedback
    public function index() {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }

    // Store feedback
    public function store(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'feedback' => 'required|string|max:4000',
            
        ]);
    
        $fileContent = null;
        if ($request->hasFile('file')) {
            $fileContent = file_get_contents($request->file('file')->getRealPath());
        }
    
        Feedback::create([
            'username' => $request->username,
            'email' => $request->email,
            'feedback' => $request->feedback,
            
        ]);
    
        return response()->json(['message' => 'Feedback submitted successfully'], 201);
    }

    // Delete feedback by ID
    public function destroy($id) {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['message' => 'Feedback not found'], 404);
        }

        $feedback->delete();
        return response()->json(['message' => 'Feedback deleted successfully'], 200);
    }
}
