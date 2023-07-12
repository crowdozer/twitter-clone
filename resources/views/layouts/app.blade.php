@props(['slim' => false])

<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The hottest spot on the block">

    {{-- HTMX --}}
    <script src="https://unpkg.com/htmx.org@1.9.2"
        integrity="sha384-L6OqL9pRWyyFU3+/bjdSri+iIphTN/bvYyM37tICVyOJkWZLpP2vGn6VUEXgzg6h" crossorigin="anonymous">
    </script>

    {{-- ALPINE --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CUSTOM/TAILWIND --}}
    @vite('resources/css/app.css')
</head>

<body class="h-screen w-screen bg-stone-950 text-white lg:overflow-hidden">
    @if ($slim)
        {{-- Alternate view, less complexity, more freeform --}}
        <div class="max-w-[1033px] mx-auto h-full">
            @yield('content')
        </div>
    @else
        <div class="h-full mx-auto">
            {{-- Twitter styled view --}}
            <div class="px-4 mx-auto max-w-lg lg:px-0 lg:flex lg:flex-row lg:h-full lg:p-4 lg:max-w-[1033px]">
                {{-- first column --}}
                <div class="lg:w-[240px] lg:shrink-0 lg:pb-16 lg:pr-2">
                    <header role="banner" class="contents">
                        {{-- mobile view --}}
                        <div class="flex flex-row lg:hidden">
                            <x-layout.mobile-header />
                        </div>

                        {{-- desktop view --}}
                        <div class="flex-col gap-2 h-full hidden lg:flex">
                            <x-layout.desktop-header />
                        </div>
                    </header>
                </div>

                {{-- second column --}}
                <main class="lg:grow lg:overflow-x-hidden lg:overflow-y-auto">
                    <!-- This is where the content of your child views will be injected -->
                    @yield('content')
                </main>

                {{-- third column --}}
                <div class="lg:block lg:w-[240px] lg:shrink-0 lg:pb-16 lg:pl-2">
                    <div class="flex flex-col gap-2 h-full">
                        {{-- User might not be logged in if viewing anonymously --}}
                        {{-- if logged in, and on desktop, show The Scams --}}
                        {{-- otherwise, if still on desktop, show The Signup Hook --}}
                        @if (Auth::check())
                            <div class="hidden lg:block">
                                <x-layout.scam-bar />
                            </div>
                        @else
                            <div class="hidden lg:block">
                                <div class="p-4 rounded-xl bg-stone-900">
                                    <h2 class="text-2xl font-bold">Sign Up</h2>
                                    <p class="mt-4">Make an account so we hit our quota! It's free!</p>
                                    <div class="mt-6">
                                        <a href="/walled-garden/sign-up"
                                            class="p-2 px-4 cursor-pointer rounded-full bg-fuchsia-600 hover:bg-fuchsia-700 active:bg-fuchsia-800  text-white hover:text-white">
                                            <span class="line-through">scam me</span> sign up
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4 rounded-xl bg-stone-900">
                                    <h2 class="text-2xl font-bold">Heads Up</h2>
                                    <p class="mt-4">Some features are disabled while not signed in.</p>
                                    <p class="mt-4">Heads Up?</p>
                                    <p>Sign Up?</p>
                                    <p class="mt-4">Do we look desperate?</p>
                                </div>
                            </div>
                        @endif

                        {{-- spacer --}}
                        <div class="hidden lg:flex lg:grow lg:flex-col-reverse">
                            <hr />
                        </div>

                        {{-- Footer --}}
                        <div class="hidden lg:block">
                            <x-layout.footer />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @yield('page-scripts')
</body>

</html>
