<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Storage; // Correct Storage import

class FirebaseStorageService
{
    protected $storage;

    public function __construct()
    {
        // Initialize Firebase using the service account credentials
        $factory = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/serviceAccount.json'));

        // Create a Storage instance
        $this->storage = $factory->createStorage();
    }

    public function uploadFile($file, $path)
    {
        $bucket = $this->storage->getBucket(); // Retrieve the storage bucket

        // Upload the file to the given path in the storage bucket
        $object = $bucket->upload(
            fopen($file->getRealPath(), 'r'),
            ['name' => $path]
        );

        // Make the file publicly readable
        $object->update(['acl' => []], ['predefinedAcl' => 'publicRead']);

        // Return the public URL of the uploaded file
        return "https://storage.googleapis.com/{$bucket->name()}/{$path}";
    }

    public function deleteFile($path)
    {
        $bucket = $this->storage->getBucket(); // Retrieve the storage bucket
        $object = $bucket->object($path); // Get the object from the bucket

        if ($object->exists()) {
            $object->delete(); // Delete the object if it exists
        }
    }
}
