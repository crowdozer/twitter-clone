@extends('layouts.app')

@section('title', 'TweetHub')

@section('content')
    <div class="mx-auto max-w-4xl pr-4">
        <x-post :post="$post" />
        <x-make-reply :post="$post" />
        <x-post-feed :posts="$replies" infinitescrollurl="/api/posts/{{ $post['id'] }}" />
    </div>
@endsection
