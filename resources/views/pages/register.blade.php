<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div>
     @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="/register" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text"  value="{{ old('email') }}"  name="name" id="name">
            <label for="email">Email</label>
            <input type="email" value="{{ old('email') }}" name="email" id="email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
             <label for="password_confirmation">confirm_Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</body>

</html> -->