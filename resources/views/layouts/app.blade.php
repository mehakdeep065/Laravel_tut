<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ $activeDaisyTheme }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/754e441a92.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <div class="navbar bg-base-100 shadow-md">
            <div class="flex-1">
                <a href="{{ url('/') }}" class="btn btn-ghost normal-case text-xl text-base-content ">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-3">
                    @guest
                     <div class="flex items-center">
                        @if (Route::has('login'))
                            <li><a class="text-base-content" href="{{ route('login') }}">Login</a></li>
                        @endif
                            <li><a class="text-base-content" href="/about">About</a></li>
                            <li><a class="text-base-content" href="/contact">Contact</a></li>
                            <li><a class="btn btn-primary btn-outline mx-4" href="/admin">Admin</a></li>
                        </div>
                        @if (Route::has('register'))
                            <li><a class="btn btn-outline btn-secondary " href="{{ route('register') }}">Register</a></li>
                        @endif
                    @else
                    <div class="flex gap-2 items-center">
                        <li><a class="text-base-content" href="/about">About</a></li>
                        <li><a class="text-base-content" href="/contact">Contact</a></li>
                        <li><a class="text-base-content" href="/showWebform">Add Websites</a></li>
                        <li><a class="text-base-content" href="/webshow">Show Websites</a></li>
                        <li><a class="text-base-content" href="/ask-form">Ask Chat</a></li>
                        <li><a class="text-base-content" href="/posts">Posts</a></li>
                        <li><a class="text-base-content" href="/news">News</a></li>

                        <li>
                            <details>
                                <summary class="text-base-content">{{ Auth::user()->name }}</summary>
                                <ul class="p-2 bg-base-100 rounded-t-none">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="btn btn-error btn-sm text-base-100">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </details>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>


        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>