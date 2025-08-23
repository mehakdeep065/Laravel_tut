<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Posts</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-base-200 min-h-screen flex items-center justify-center">
  <div class="card w-full max-w-lg shadow-xl bg-base-100">
    <div class="card-body">
      <h1 class="text-2xl font-bold text-center">📤 Upload Post</h1>

      {{-- Success Message --}}
      @if(session('success'))
        <div class="alert alert-success shadow-lg">
          <span>{{ session('success') }}</span>
        </div>
      @endif

      {{-- Error Message --}}
      @if(session('error'))
        <div class="alert alert-error shadow-lg">
          <span>{{ session('error') }}</span>
        </div>
      @endif

      {{-- Validation Errors --}}
      @if($errors->any())
        <div class="alert alert-error shadow-lg">
          <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        
        <!-- Post Name -->
        <div class="form-control">
          <label class="label">
            <span class="label-text">Post Name</span>
          </label>
          <input type="text" name="post_name" placeholder="Enter post title"
            class="input input-bordered w-full" required>
        </div>

        <!-- Category -->
        <div class="form-control">
          <label class="label">
            <span class="label-text">Category Name</span>
          </label>
          <input type="text" name="cate_name" placeholder="Enter category"
            class="input input-bordered w-full" required>
        </div>

        <!-- File Upload -->
        <div class="form-control">
          <label class="label">
            <span class="label-text">Upload Post</span>
          </label>
          <input type="file" name="post_path" class="file-input file-input-bordered w-full" required>
        </div>

        <!-- Submit Button -->
        <div class="form-control mt-6">
          <button type="submit" class="btn btn-primary w-full">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
