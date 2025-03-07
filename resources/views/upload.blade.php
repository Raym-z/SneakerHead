<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Upload Image to Firebase</h2>

        @if(session('success'))
            <p class="text-green-500">{{ session('success') }}</p>
            <img src="{{ session('image_url') }}" class="mt-4 rounded-md w-full">
        @endif

        <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <input type="file" name="image" class="block w-full p-2 border rounded-md" required>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Upload</button>
        </form>
    </div>

</body>
</html>
