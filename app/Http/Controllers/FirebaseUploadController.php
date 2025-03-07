<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseStorageService;

class FirebaseUploadController extends Controller
{
    protected $firebaseStorage;

    public function __construct(FirebaseStorageService $firebaseStorage)
    {
        $this->firebaseStorage = $firebaseStorage;
    }

    public function showUploadForm()
    {
        return view('upload'); // Returns the upload page
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Limit to 2MB images
        ]);

        $file = $request->file('image');
        $uploadedUrl = $this->firebaseStorage->uploadImage($file);

        return back()->with('success', 'Image uploaded successfully!')->with('image_url', $uploadedUrl);
    }
}
