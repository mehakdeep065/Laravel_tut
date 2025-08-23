<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-base-200 text-base-content">

    <div class="flex justify-center items-center min-h-screen">
        <div class="card bg-base-100 shadow-xl w-full max-w-4xl">
            
            <!-- Header -->
            <div class="navbar bg-primary text-primary-content rounded-t-xl">
                <div class="flex-1">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                </div>
                <div class="flex gap-2">
                    <a href="/admin/register" class="btn btn-secondary btn-sm">Add new admin</a>
                    <a href="/admin/templates" class="btn btn-accent btn-sm">Themes</a>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto p-4">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>
