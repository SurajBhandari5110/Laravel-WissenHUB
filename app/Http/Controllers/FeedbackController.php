<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'file' => 'nullable|file|max:10240', // 10MB max file size
        ]);
    
        $fileUrl = null;
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            
            // Store file to S3
            $path = Storage::disk('s3')->put('feedback-files/' . $fileName, file_get_contents($file));
            
            // Generate the URL to the file
            $fileUrl = Storage::disk('s3')->url('feedback-files/' . $fileName);
        }
    
        Feedback::create([
            'username' => $request->username,
            'email' => $request->email,
            'feedback' => $request->feedback,
            'file' => $fileUrl,
        ]);
    
        return response()->json(['message' => 'Feedback submitted successfully'], 201);
    }

    // Delete feedback by ID
    public function destroy($id) {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['message' => 'Feedback not found'], 404);
        }

        // Delete associated file from S3 if it exists
        if ($feedback->file_url) {
            // Extract the path from the URL
            $path = parse_url($feedback->file_url, PHP_URL_PATH);
            $path = ltrim($path, '/'); // Remove leading slash
            
            // If the URL is a proper S3 URL and your bucket name is part of the URL
            // you may need to strip the bucket name from the path as well
            // $path = preg_replace('/^your-bucket-name\//', '', $path);
            
            if (Storage::disk('s3')->exists($path)) {
                Storage::disk('s3')->delete($path);
            }
        }

        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully');
    }
}