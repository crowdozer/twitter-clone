@extends('layouts.app', ['slim' => true])

@section('title', 'Log In to TweetHub')

@section('content')
    <div class="flex flex-col h-full">
        <div class="grow"></div>
        <div class="max-w-xs w-full mx-auto">
            <h1 class="text-5xl font-bold text-center mb-2"><span class="text-stone-500">#</span>TweetHub</h1>
            <h2 class="text-lg font-bold m-0 text-center mb-8">Look who came crawling back</h2>
            <div class="border border-stone-500 rounded-2xl p-8">
                <h2 class="text-lg font-bold mb-4">Log in to continue</h2>
                <form hx-post="/api/auth/log-in" hx-trigger="submit" hx-target="#login-output">
                    @csrf
                    <div class="flex flex-col gap-4">
                        {{-- inputs --}}
                        <div>
                            <label for="login-username" class="text-stone-500">username</label>
                            <input id="login-username" class="w-full px-4 py-2 rounded-full" placeholder="@username"
                                name="username" required />
                        </div>
                        <div>
                            <label for="login-password" class="text-stone-500">password</label>
                            <input id="login-password" class="w-full px-4 py-2 rounded-full" placeholder="password"
                                type="password" name="password" required />
                        </div>

                        {{-- message to flash output --}}
                        <div id="login-output"></div>

                        {{-- controls --}}
                        <div class="flex flex-col gap-2">
                            <button type="submit"
                                class="w-full px-4 py-2 rounded-full bg-fuchsia-600 hover:bg-fuchsia-700 active:bg-fuchsia-800">
                                Log In
                            </button>
                            <a href="/walled-garden/sign-up"
                                class="w-full px-4 py-2 rounded-full bg-stone-600 hover:bg-stone-700 active:bg-stone-800 text-white hover:text-white text-center font-bold">
                                I'm new here
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grow"></div>
        <div class="grow"></div>
    </div>
@endsection
