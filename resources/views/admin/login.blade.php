<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-base-200 flex justify-center items-center min-h-screen">

    <div class="card w-full max-w-md shadow-2xl bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-3xl justify-center">Admin Login</h2>

            @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-3">
                @csrf

                <!-- Email -->
                <div>
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Enter email"
                           class="input input-bordered w-full" required />
                    @error('email')
                        <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" placeholder="Enter password"
                           class="input input-bordered w-full" required />
                    @error('password')
                        <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Button -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-full">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
