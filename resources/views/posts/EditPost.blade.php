<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-base-200 min-h-screen flex items-center justify-center">

    <div class="card w-full max-w-lg shadow-2xl bg-base-100 p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Update Post</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success mb-4">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-error mb-4">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-warning mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')

            <!-- Post Name -->
            <div class="form-control">
                <label for="post_name" class="label">
                    <span class="label-text">Change Post Name</span>
                </label>
                <input type="text" name="post_name" id="post_name" value="{{ $post->post_name }}"
                    class="input input-bordered w-full" required>
            </div>

            <!-- Category Name -->
            <div class="form-control">
                <label for="cate_name" class="label">
                    <span class="label-text">Change Category Name</span>
                </label>
                <input type="text" name="cate_name" id="cate_name" value="{{ $post->cate_name }}"
                    class="input input-bordered w-full" required>
            </div>

            <!-- Upload File -->
            <div class="form-control">
                <label for="post_path" class="label">
                    <span class="label-text">Upload Different Post</span>
                </label>
                <input type="file" name="post_path" id="post_path"
                    class="file-input file-input-bordered w-full" required>
            </div>

            <!-- Submit Button -->
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary w-full">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
