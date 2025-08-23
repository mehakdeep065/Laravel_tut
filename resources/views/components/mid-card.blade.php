@props(['image', 'title', 'description', 'views', 'likes', 'price', 'reverse' => false])

@php
    $flexDirection = $reverse ? 'lg:flex-row-reverse' : 'lg:flex-row';
@endphp

<div class="card lg:card-side bg-base-100 shadow-xl mx-auto max-w-5xl py-4 flex gap-4">
    <figure class="lg:w-1/2">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full rounded-lg">
    </figure>
    <div class="card-body lg:w-1/2">
        <h2 class="card-title text-primary">{{ $title }}</h2>
        
        <!-- Stars -->
        <div class="flex space-x-1 text-yellow-500">
            @for ($i = 0; $i < 5; $i++)
                <i class="fa-solid fa-star"></i>
            @endfor
        </div>

        <!-- Description -->
        <p class="text-base-content">{{ $description }}</p>
        
        <!-- Stats -->
        <p class="text-sm opacity-70">{{ $views }} views • {{ $likes }} likes</p>
        
        <!-- Footer -->
        <div class="card-actions justify-between items-center mt-4">
            <button class="btn btn-primary">▲ See Details</button>
            <p class="font-semibold">Starts at {{ $price }}/day</p>
        </div>
    </div>
</div>
