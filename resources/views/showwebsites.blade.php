<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website show</title>
    @vite('resources/css/app.css')
</head>

<body>
   <div class="flex justify-center items-center h-[100vh] bg-[#FDFAF6]">
    <div class="  bg-[#B2B0E8] min-h-[60vh] p-10 rounded-xl w-full max-w-4xl">
        <div class=" bg-[#3B38A0] flex justify-between items-center p-4 mb-4 rounded">
            <h1 class="text-3xl font-mono">Dashboard</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-collapse  rounded">
                <thead class="bg-[#B2B0E8] ">
                    <tr>
                        <th class="border px-4 py-2">WebsiteName</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Webpath</th>
                        <th class="border px-4 py-2">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($websites as $web)
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="border px-4 py-2">{{ $web->website_name}}</td>
                            <td class="border px-4 py-2">{{ $web->website_description }}</td>
                            <td class="border px-4 py-2 w-[40px]">{{ $web->zip_path}}</td>
                            <td class="border px-4 py-2">{{ $web->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>
