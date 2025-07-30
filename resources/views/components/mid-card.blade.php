@props(['image', 'title', 'description', 'views', 'likes', 'price', 'reverse' => false])

@php
    $flexDirection = $reverse ? 'row-reverse' : 'row';
@endphp

<div class="mid-card-wrapper">
    <div class="mid-card">
        <div class="mid-card-inner" style="flex-direction: {{ $flexDirection }};">
            <img class="mid-card-image" src="{{ $image }}" alt="image">
            <div class="mid-card-content">
                <h1>{{ $title }}</h1>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="description">{{ $description }}</p>
                <p>{{ $views }} views • {{ $likes }} likes</p>
                <div class="mid-card-footer">
                    <button class="see-details">▲ See Details</button>
                    <p>Starts at {{ $price }}/day</p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>