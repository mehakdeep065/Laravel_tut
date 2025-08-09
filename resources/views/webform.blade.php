<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show_form</title>
    @vite('resources/css/app.css')

</head>

<body>

    <div class="flex  bg-blue-500 text-xl  border justify-center items-center h-screen ">
        <div>

            <form class="bg-blue-100 flex flex-col gap-2 rounded p-10" action="/submitweb" method="post" enctype="multipart/form-data">
                @csrf
                <label for="webname">Website name</label>
                <input type="text" value="{{ old('webname') }}" name="webname" id="webname">
                <label for="webdes">Website Description</label>
               <textarea name="webdes" id="webdes" rows="4" cols="50">{{ old('webdes') }}</textarea>
                <input type="file" name="zipfile" required>
                <button class="bg-blue-400 p-2 w-1/2 mt-5 rounded-xl flex self-center justify-center
                
                
                " type="submit">Upload Website</button>

            </form>
        </div>
    </div>

</body>

</html>