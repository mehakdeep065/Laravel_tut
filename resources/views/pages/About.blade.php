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

        <body class="about-bg">
            <div class="about-container">
                <div class="about-card">
                    <h1 class="heading">About Us</h1>
                    <h1 class="heading">Your exploration starts here</h1>
                    <p class="description">
                        Our mission is to connect you with the wonders of our parks, offering tailored
                        experiences for every adventurer. Embrace the call of the wild and let the journey
                        unfold.
                    </p>
                    <hr class="divider">
                    <div class="contact-info">
                        <p>+1 (514)-1234567</p>
                        <p>info@parkspace-adventures.com</p>
                    </div>
                </div>
            </div>

          
            </div>
            </div>
        </body>
        <x-head_foot contClass="aboutfoot" />
    </main>

    </html>

@endsection