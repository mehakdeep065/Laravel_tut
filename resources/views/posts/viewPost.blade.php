<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/754e441a92.js" crossorigin="anonymous"></script>
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
                    <div
                        class="bg-[#ffffff] border border-[#e5e7eb] rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->post_path) }}"
                            alt="{{ $post->post_name }}">
                        <div class="p-4">
                            <h2 class="text-xl font-bold text-[#1f2937] mb-2 flex justify-between">{{ $post->post_name }}
                                <span>({{ $post->cate_name }})</span>
                                <div>
                                    <div class="flex gap-2">
                                       <a href="{{ route('posts.edit',$post->id) }}"><button class="bg-green-300 text-gray-600 px-2 rounded">Edit</button></a>
                                       <form action="{{ route('posts.delete', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('posts.delete',$post->id) }}"><button type="submit" class="border-2 text-black px-2 rounded"><i class="fa-solid fa-trash"></i></button></a>
                                        </form>
                                    </div>
                                </div>
                            </h2>
                            <p class="text-[#4b5563] text-sm">{{ Str::limit($post->post_description, 100) }}</p>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</body>

</html>