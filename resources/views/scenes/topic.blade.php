@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="mx-auto max-w-4xl pr-4">
        <div class="bg-stone-900 py-8 px-4">
            <h1 class="text-4xl text-white font-bold">Topics</h1>
            <h2 class="text-2xl text-fuchsia-500 font-bold mt-4"><span class="text-white">{{ $catchphrase }}</span>
                #{{ $topic }}</h2>
            <h3 class="text-xl text-stone-500 font-bold mt-2">52K tweets in the past hour</h3>
        </div>
        <div class="mt-2">
            <div class="flex flex-col">
                @foreach ($posts as $post)
                    <x-post :post="$post" />

                    @if (!$loop->last)
                        <hr />
                    @endif

                    {{-- advertisement time --}}
                    @if (($loop->index + 1) % 5 == 0 && !$loop->first)
                        <x-feed-advertisement />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
