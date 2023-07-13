@extends('layouts.app')

@section('title', 'TweetHub Detective Agency')

@section('content')
    <div class="lg:my-0 lg:pr-4">
        <div class="bg-stone-900 py-8 px-4 my-8">
            <h1 class="text-4xl text-white font-bold">Search</h1>
            <h3 class="text-xl text-stone-500 font-bold mt-2">"{{ $search }}"</h3>
        </div>
        <div class="mt-2">
            <x-post-feed :posts="$posts" infinitescrollurl="/api/posts/search?q={{ $search }}" />
        </div>
    </div>
@endsection
