@extends('layouts.app')

@section('content')

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home_main</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <script src="https://kit.fontawesome.com/754e441a92.js" crossorigin="anonymous"></script>

</head>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card ">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
<main>
    <body class="contact-body">
    <div class="contact-container">
        <div class="contact-card">
            <h1 class="heading">Write feedback or questions</h1>
            <form method="post" class="contact-form">
                <label for="email">Enter Email</label>
                <input class="input" type="email" name="email" id="email">

                <label for="qustion">Enter message</label>
                <input class="input message" type="text" name="qustion" id="qustion">

                <input class="submit-btn" type="submit" value="Submit" name="submit">
            </form>

            <div class="contact-details">
                <p>+91 9815974905</p>
                <p>mk76269464@gmail.com</p>
            </div>

            <div class="social-icons">
                <a href="https://github.com/mehakdeep065"><i class="fa-brands fa-github fa-xl"></i></a>
                <a href="https://www.linkedin.com/in/mehak-deep-singh065/"><i class="fa-brands fa-linkedin fa-xl"></i></a>
                <a href="https://portfolio-me1.vercel.app/"><i class="fa-solid fa-earth-africa fa-xl"></i></a>
            </div>
        </div>
    </div>
    <x-head_foot contClass="contactfoot"/>
</body>

</main>
</html>

@endsection