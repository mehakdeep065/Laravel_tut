<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    @vite('resources/css/app.css')


</head>

<body>
    <div class="flex bg-gray-200 justify-center h-[100vh] items-center">
        <div class="login_div_in bg-white p-20 flex flex-col gap-10  text-xl rounded-2xl">
            <h2 class="flex w-full border p-1 rounded font-mono  text-4xl  justify-center ">Admin Login</h2>
            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            <form class="flex flex-col gap-1  w-[20vw] " action="{{ route('admin.login') }}" method="POST">
                @csrf
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <label for="email">Email</label>
                <input class="p-1 border " type="email" name="email" placeholder="Email" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <label for="password">Password</label>
                <input class="p-1 border" type="password" name="password" placeholder="Password" required>
                <button class="border p-2 bg-blue-600 text-white rounded mt-5" type="submit">Login</button>
            </form>
        </div>
    </div>

</body>

</html>