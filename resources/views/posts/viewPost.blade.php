<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col justify-center items-center min-h-screen bg-[#FAF9EE]">
        <div class="bg-[#DCCFC0] p-6 rounded-lg flex flex-col gap-4 w-11/12 sm:w-3/4 lg:w-1/2 shadow-lg">
            <!-- Header -->
            <div class="flex bg-[#4f46e5] text-white text-xl p-4 rounded-md justify-between items-center">
                <h1 class="text-2xl font-semibold">View Posts</h1>
                <a href="{{ url('/posts-form') }}"
                   class="bg-[#6366f1] hover:bg-[#4338ca] px-4 py-2 rounded text-lg transition duration-200">
                    Post Upload
                </a>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-[#ffffff] border border-[#e5e7eb] rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->post_path) }}"
                            alt="{{ $post->post_name }}">
                        <div class="p-4">
                            <h2 class="text-xl font-bold text-[#1f2937] mb-2">{{ $post->post_name }}</h2>
                            <p class="text-[#4b5563] text-sm">{{ $post->post_description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
