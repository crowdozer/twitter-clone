@extends('layouts.app')

@section('title', 'TweetHub')

@section('content')
    <div class="lg:pr-4 relative">
        <x-post :post="$post" />
        @if (Auth::check())
            <x-make-reply />
        @endif
        <hr />
        <div class="sticky top-0 bg-stone-950">
            <h1 class="text-xl text-stone-500 font-bold mt-4 mb-4">Replies to
                {{ '@' }}{{ $post['author_id'] }}</h1>
            <hr />
        </div>
        <x-post-feed :posts="$replies" infinitescrollurl="/api/posts/{{ $post['id'] }}" />
    </div>
@endsection
