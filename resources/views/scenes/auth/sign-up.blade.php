@extends('layouts.app', ['slim' => true])

@section('title', 'Sign Up for TweetHub')

@section('content')
    <div class="flex flex-col h-full">
        <div class="grow"></div>
        <div class="max-w-xs w-full mx-auto">
            <h1 class="text-5xl font-bold text-center mb-2"><span class="text-stone-500">#</span>TweetHub</h1>
            <h2 class="text-lg font-bold m-0 text-center mb-8">You look like a troublemaker</h2>
            <div class="border border-stone-500 rounded-2xl p-8">
                <x-scenes.sign-up.form :name="$name" :username="$username" :email="$email" :password="$password"
                    :errors="$errors" />
            </div>

            {{-- Disclaimer --}}
            <div class=" bg-stone-900 rounded-2xl p-4 mt-8 text-stone-500">
                This really does create an account, it's not a mockup.
            </div>
        </div>
        <div class="grow"></div>
        <div class="grow"></div>
    </div>
@endsection
