<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Posts</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Upload Post</h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Post Name -->
            <div>
                <label for="postname" class="block text-gray-700 font-medium mb-2">Post Name</label>
                <input type="text" name="postname" id="postname"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
            </div>

            <!-- Post Description -->
            <div>
                <label for="postdes" class="block text-gray-700 font-medium mb-2">Post Description</label>
                <textarea name="postdes" id="postdes" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"></textarea>
            </div>

            <!-- File Upload -->
            <div>
                <label for="post" class="block text-gray-700 font-medium mb-2">Upload Post</label>
                <input type="file" name="filepath" id="post"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition duration-200">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>

</html>
