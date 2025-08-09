<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     @vite('resources/css/app.css')
</head>
<body>
    <div class="flex bg-slate-600 h-screen justify-center items-center">
    <form class="flex flex-col " method="post" action="/ask">
        @csrf
        <label class="text-3xl text-white mb-2">Write Text Here</label>
        <textarea class="border rounded bg-slate-400" name="ask" rows="4" cols="50" ></textarea>
        <input class="border mt-4 w-1/2 flex self-center p-2 rounded bg-black text-white text-lg" type="submit" value="Submit" name="submit">
    </form>
</div>
</body>
</html>

