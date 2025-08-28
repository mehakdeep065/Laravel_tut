@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Latest RSS Posts</h1>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
       <!-- <pre>{{ print_r($posts) }}</pre>  -->
        @foreach($posts as $post)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                {{-- Post Thumbnail / Description with Images --}}
                <div class="desimg p-4 prose max-w-none">
                    {!! $post->description !!}
                </div>

                <div class="p-4 border-t">
                    <a href="{{ $post->link }}" target="_blank" class="block mb-2">
                        <h3 class="text-xl font-semibold text-blue-600 hover:underline">
                            {{ $post->title }}
                        </h3>
                    </a>

                    <p class="text-gray-700 text-sm mb-3">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->description), 120, '...') }}
                    </p>

                    <small class="text-xs text-gray-500">Category: {{ $post->category }}</small>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection
