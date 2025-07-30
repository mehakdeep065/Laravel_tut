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
    <body class="overflow-x-clip">
    <div>
        <main>
          
            <x-hero />
            <x-contant1 />
            <!-- <x-card /> -->
            <div>
                <h3 class="topthings">Top Things to do in parks</h3>
                <x-mid-card image="/images/van2.PNG" title="Special Private Tour" description="Whether you're seeking a romantic getaway, a family adventure, or a solo expedition, our private
                    tours ensure that your journey through our park becomes an unforgettable and truly exceptional
                    escape. Discover the park's secrets at your own pace and immerse yourself in its beauty with the
                    ultimate blend of comfort and exploration." views="400" likes="150" price="$299" />
                <x-mid-card image="\images\track.PNG" title="Customized Group Hiking" description="Our expert guides ensure safety and share their local knowledge, enhancing your understanding of the park's ecology and history. Unite with nature, bond with your group, and forge unforgettable memories on a trail gdesigned exclusively for you." views="320" likes="250" price="$199" reverse="true" />
                <x-mid-card image="\images\boat.PNG" title="Kayak & Drifting Journey" description="Our service offers an unforgettable blend of kayaking and drifting, perfect for both novice and experienced water enthusiasts. Navigat through lush landscapes, witness hidden coves, and soak in breathtaking views that can only be experienced from the water." views="600" likes="170" price="$399" />
            </div>
        </main>
    </div>
    <x-head_foot class="" />
</body>

</main>
</html>

@endsection
