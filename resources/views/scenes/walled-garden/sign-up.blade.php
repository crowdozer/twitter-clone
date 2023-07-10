@extends('layouts.app', ['slim' => true])

@section('title', 'Sign Up for TweetHub')

@section('content')
    <div class="flex flex-col h-full">
        <div class="grow"></div>
        <div class="max-w-xs w-full mx-auto">
            <h1 class="text-5xl font-bold text-center mb-2"><span class="text-stone-500">#</span>TweetHub</h1>
            <h2 class="text-lg font-bold m-0 text-center mb-8">You look like a troublemaker</h2>
            <div class="border border-stone-500 rounded-2xl p-8">

                <form action="/api/auth/sign-up" method="post">
                    <div class="flex flex-col gap-4">
                        <div>
                            <h2 class="text-lg font-bold">Register a new account</h2>
                            <p class="mt-2 text-stone-400">It doesn't cost any money.</p>
                            <p class=" text-stone-400">You pay the price in dignity.</p>
                        </div>
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

                        <div class="relative">
                            <input type="checkbox" id="not-a-trouble-maker" name="not-a-trouble-maker" class="hidden">
                            <label for="not-a-trouble-maker" class="flex items-center cursor-pointer select-none">
                                <span class="w-5 h-5 border border-stone-700 rounded-lg mr-2">
                                    <span id="not-a-trouble-maker-check"
                                        class="font-bold text-fuchsia-500 hidden text-center -mt-0.5">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </span>
                                <span class="text-stone-500 mb-0.5">I'm not a troublemaker</span>
                            </label>
                            <div id="troublemaker-error" class="hidden text-red-500">This field is required</div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <button type="submit"
                                class="w-full px-4 py-2 rounded-full bg-fuchsia-600 hover:bg-fuchsia-700 active:bg-fuchsia-800">
                                Let me in!
                            </button>
                            <a href="/walled-garden"
                                class="w-full px-4 py-2 rounded-full bg-stone-600 hover:bg-stone-700 active:bg-stone-800 text-white hover:text-white text-center font-bold">
                                I have an account
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

@section('page-scripts')
    <script src="/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle checkbox toggle
            $('#not-a-trouble-maker').change(function() {
                // On check
                if ($(this).is(':checked')) {
                    $('#not-a-trouble-maker-check')
                        .removeClass('hidden')
                        .addClass('block');
                    $('#troublemaker-error').addClass('hidden');
                }

                // On uncheck
                else {
                    $('#not-a-trouble-maker-check')
                        .removeClass('block')
                        .addClass('hidden');
                }
            });

            // Ensure the checkbox is checked on submit
            $('form').on('submit', function(e) {
                if (!$('#not-a-trouble-maker').is(':checked')) {
                    e.preventDefault();
                    $('#troublemaker-error').removeClass('hidden');
                }
            });
        });
    </script>
@endsection
