<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/754e441a92.js" crossorigin="anonymous"></script>
</head>

<body class="bg-base-200">
    <div class="flex flex-col justify-center items-center min-h-screen">
        <div class="card w-11/12 sm:w-3/4 lg:w-2/3 bg-base-100 shadow-xl p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">View Posts</h1>
                <a href="{{ url('/posts-form') }}" class="btn btn-primary">
                    + Post Upload
                </a>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($posts as $post)
                    <div class="card bg-base-100 border border-gray-200 shadow-sm hover:shadow-lg transition duration-300">
                        <figure>
                            <img src="{{ asset('storage/' . $post->post_path) }}" 
                                 alt="{{ $post->post_name }}" 
                                 class="w-full h-48 object-cover">
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-lg justify-between">
                                <span>{{ $post->post_name }}</span>
                                <span class="badge badge-secondary">{{ $post->cate_name }}</span>
                            </h2>

                            <p class="text-sm text-gray-600">
                                {{ Str::limit($post->post_description, 100) }}
                            </p>

                            <!-- Actions -->
                            <div class="card-actions justify-end mt-4">
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                <form action="{{ route('posts.delete', $post->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</body>

</html>
