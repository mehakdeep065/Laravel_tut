<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Show</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-base-200">
   <div class="flex justify-center items-center h-[100vh]">
    <div class="card bg-base-100 shadow-xl w-full max-w-5xl p-6">
        
        <!-- Header -->
        <div class="navbar bg-primary text-primary-content rounded-xl mb-6 px-6">
            <h1 class="text-3xl font-bold">Dashboard</h1>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Website Name</th>
                        <th>Description</th>
                        <th>Web Path</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($websites as $web)
                        <tr>
                            <td>{{ $web->website_name }}</td>
                            <td>{{ $web->website_description }}</td>
                            <td>
                                <a href="{{ $web->zip_path }}" 
                                   class="link link-primary break-words">
                                   {{ $web->zip_path }}
                                </a>
                            </td>
                            <td>{{ $web->created_at->format('d M, Y h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>
