@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-extrabold mb-10 text-center text-gray-900 tracking-tight">
            Latest RSS Posts
        </h1>

        <!-- Grid layout: 1 col on mobile, 2 on md, 3 on lg -->
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden flex flex-col">
                    
                    <!-- Post Image -->
                    @if($post->imgurl)
                        <img src="{{ $post->imgurl }}" alt="{{ $post->title }}" 
                             class="w-full h-48 object-cover">
                    @endif

                    <!-- Card Body -->
                    <div class="p-5 flex flex-col flex-grow">
                        <a href="{{ $post->link }}" target="_blank" class="text-xl font-semibold text-blue-600 hover:underline mb-2">
                            {{ \Illuminate\Support\Str::words(strip_tags($post->title), 10, '...') }}
                        </a>

                        <p class="text-gray-700 text-sm flex-grow">
                            {!! \Illuminate\Support\Str::words(strip_tags($post->description), 40, '...') !!}
                        </p>
                        <h5 class="text-green-700 ">Category: {{ $post->category }}</h5>

                        <div class="mt-4">
                            <a href="{{ $post->link }}" target="_blank" 
                               class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                                Read More →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
