@extends('layouts.app')

@section('title', 'TweetHub')

@section('content')
    <div class="lg:pr-4">
        <div class="my-8 lg:mt-2">
            <h1 class="text-2xl font-bold mb-2">What's cookin'?</h1>
            <x-make-reply />
        </div>
        <div class="mt-2">
            <x-post-feed :posts="$posts" infinitescrollurl="/api/posts" />
        </div>
    </div>
@endsection
