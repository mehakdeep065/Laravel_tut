
    @props(['image', 'title', 'description', 'views', 'likes', 'price', 'reverse' => false])

    @php
        $flexDirection = $reverse ? 'flex-row-reverse' : 'flex-row';
    @endphp

    <div class="flex justify-center mt-10  ">
        <div class="flex {{ $flexDirection }} mx-100">
            <img class="w-2/5" src="{{ $image }}" alt="van">
            <div class=" w-1/2 flex flex-col justify-center gap-4 px-20 text-black">
                <h1 class="text-2xl font-medium">{{ $title }}</h1>
                <div class="flex">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="text-gray-400">{{ $description }}</p>
                <p>{{ $views }} views {{ $likes }} likes</p>
                <div class="flex gap-4 items-center">
                    <button class="border  py-2 px-4 text-white 
          bg-[#171616] rounded-3xl">▲ see Details</button>
                    <p>Starts at {{ $price }}/day</p>
                </div>
            </div>
        </div>
    </div>
