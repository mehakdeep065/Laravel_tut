
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

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
             
            <!-- Post Name -->
            <div>
                <label for="post_name" class="block text-gray-700 font-medium mb-2">Change Post Name</label>
                <input type="text" name="post_name" id="post_name" value="{{ $post->post_name }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    required>
                <label for="cate_name" class="block text-gray-700 font-medium mb-2">Change category Name</label>
                <input type="text" name="cate_name" id="cate_name" value="{{ $post->cate_name }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    required>
                
                <label for="post_path" class="block text-gray-700 font-medium mb-2">upload diffrent Post </label>
                <input type="file" name="post_path" id="post_path" value="{{ $post->post_path }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition duration-200">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
</body>
</html>
