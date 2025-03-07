<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Storage; // Correct Storage import

class FirebaseStorageService
{
    protected $storage;

    public function __construct()
    {
        $firebase = (new Factory)
            ->withServiceAccount(base_path(config('services.firebase.credentials'))); // Remove invalid method

        $this->storage = $firebase->createStorage(); // Get storage instance
    }

    public function uploadImage($file)
    {
        $fileName = 'sneaker_head_uploads/' . time() . '.' . $file->getClientOriginalExtension();
        $bucket = $this->storage->getBucket(); // Get Firebase bucket

        $bucket->upload(
            file_get_contents($file->getRealPath()), // Ensure correct file reading
            ['name' => $fileName]
        );

        return "https://firebasestorage.googleapis.com/v0/b/" . config('services.firebase.storage_bucket') . "/o/" . urlencode($fileName) . "?alt=media";
    }
}
