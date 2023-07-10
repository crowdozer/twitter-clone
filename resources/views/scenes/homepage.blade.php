@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="mx-auto max-w-4xl pr-4">
        <div class="mt-2">
            <h1 class="text-2xl font-bold mb-2">What's cookin'?</h1>
            <x-make-reply />
        </div>
        <div class="mt-2">
            <x-feed />
        </div>
    </div>
@endsection
