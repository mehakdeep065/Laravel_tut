<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask AI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-base-200 h-screen flex justify-center items-center">

    <div class="card w-full max-w-md shadow-xl bg-base-100 p-6">
        <h2 class="text-2xl font-bold text-center mb-4">Ask AI</h2>

        <!-- Form -->
        <form action="{{ url('ask') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <input type="text" 
                   name="post_name" 
                   placeholder="Enter post title" 
                   class="input input-bordered w-full" />

            <button type="submit" class="btn btn-primary w-full">Ask AI</button>
        </form>

        <!-- Error -->
        @if($error)
            <div class="alert alert-error mt-4">
                <span>{{ $error }}</span>
            </div>
        @endif

        <!-- Response -->
        @if($response)
            <div class="mt-6">
                <h3 class="text-lg font-semibold">AI Response:</h3>
                <div class="mockup-code mt-2 p-3">
                    <pre><code>{{ $response }}</code></pre>
                </div>
            </div>
        @endif
    </div>

</body>
</html>

