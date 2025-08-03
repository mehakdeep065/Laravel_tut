<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard </title>
    @vite('resources/css/app.css')
</head>

<body>
   <div class="flex justify-center items-center h-[100vh] bg-[#FDFAF6]">
    <div class="  bg-[#B2B0E8] min-h-[60vh] p-10 rounded-xl w-full max-w-4xl">
        <div class=" bg-[#3B38A0] flex justify-between items-center p-4 mb-4 rounded">
            <h1 class="text-3xl font-mono">Dashboard</h1>
            <a class=" px-4 py-2 bg-[#7A85C1] text-white rounded-xl text-xl" href="/admin/register">
               <p> Add new admin</p>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-collapse  rounded">
                <thead class="bg-[#B2B0E8] ">
                    <tr>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="border px-4 py-2">{{ $admin->name }}</td>
                            <td class="border px-4 py-2">{{ $admin->email }}</td>
                            <td class="border px-4 py-2">{{ $admin->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>