<!DOCTYPE html>
<html lang="en"  data-theme="{{ $activeDaisyTheme ?? 'light' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Template</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-base-200 flex justify-center items-center min-h-screen">

    <div class="card w-full max-w-lg shadow-2xl bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-2xl justify-center">🎨 Select Frontend Template</h2>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success mt-2" id="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('admin.updateTemplate') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="label">
                        <span class="label-text">Choose Theme</span>
                    </label>
                    <select name="theme" class="select select-bordered w-full">
                        @foreach ($daisyThemes as $theme)
                            <option value="{{ $theme }}" {{ $activeDaisyTheme === $theme ? 'selected' : '' }}>
                                {{ ucfirst($theme) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button class="btn btn-primary w-full" type="submit">💾 Save Theme</button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('admin.dashboard') }}" class="link link-primary">⬅Back to Dashboard</a>
            </div>
        </div>
    </div>

       <script>
        // Get the success alert element
        const successAlert = document.getElementById('success-alert');

        // If the element exists, set a timeout to hide it after 5 seconds
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
                // successAlert.style.transitionDelay = '4s';
                // Or, you can remove it completely from the DOM
                // successAlert.remove();
            }, 4000); 
        }
    </script>

</body>
</html>
