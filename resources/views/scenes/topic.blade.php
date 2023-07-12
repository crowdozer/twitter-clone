@extends('layouts.app')

@section('title', 'TweetHub Topics')

@section('content')
    <div class="lg:my-0 lg:pr-4">
        <div class="bg-stone-900 py-8 px-4 my-8">
            <h1 class="text-4xl text-white font-bold">Topics</h1>
            <h2 class="text-2xl text-fuchsia-500 font-bold mt-4"><span class="text-white">{{ $catchphrase }}</span>
                #{{ $topic }}</h2>
            <h3 class="text-xl text-stone-500 font-bold mt-2">52K tweets in the past hour</h3>
        </div>
        <div class="mt-2">
            <x-post-feed :posts="$posts" infinitescrollurl="/api/posts/topic/{{ $topic }}" />
        </div>
    </div>
@endsection
