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
<form action="{{ url('ask') }}" method="POST">
    @csrf
    <input type="text" name="post_name" placeholder="Enter post title">
    <button type="submit">Ask AI</button>
</form>

@if($error)
    <p style="color:red;">{{ $error }}</p>
@endif

@if($response)
    <h3>AI Response:</h3>
    <p>{{ $response }}</p>
@endif

</div>
</body>
</html>

