@extends('layouts.app')

@section('title', 'TweetHub')

@section('content')
    <div class="mx-auto max-w-4xl">
        <x-post :post="$post" />
        <x-make-reply :post="$post" />
        <x-post-feed :posts="$replies" />
    </div>
@endsection
