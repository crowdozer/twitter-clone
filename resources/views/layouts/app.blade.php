@props(['slim' => false])

<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- HTMX --}}
    <script src="https://unpkg.com/htmx.org@1.9.2"
        integrity="sha384-L6OqL9pRWyyFU3+/bjdSri+iIphTN/bvYyM37tICVyOJkWZLpP2vGn6VUEXgzg6h" crossorigin="anonymous">
    </script>

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CUSTOM/TAILWIND --}}
    @vite('resources/css/app.css')
</head>

<body class="h-screen w-screen overflow-hidden bg-stone-950 text-white">
    @if ($slim)
        {{-- Alternate view, less complexity, more freeform --}}
        <div class="max-w-[1033px] mx-auto h-full">
            @yield('content')
        </div>
    @else
        {{-- Twitter styled view --}}
        <div class="max-w-[1033px] mx-auto h-full">
            <div class="flex flex-row h-full p-4">
                {{-- first column --}}
                <div class="w-[240px] shrink-0 pb-16 pr-2">
                    <x-layout.header />
                </div>

                {{-- second column --}}
                <main class="grow overflow-x-hidden overflow-y-auto">
                    <!-- This is where the content of your child views will be injected -->
                    @yield('content')
                </main>

                {{-- third column --}}
                <div class="w-[240px] shrink-0 pb-16 pl-2">
                    <div class="flex flex-col gap-2 h-full">
                        {{-- if logged in, show The Scams --}}
                        @if (Auth::check())
                            <x-layout.scam-bar />
                        @else
                            {{-- otherwise, show The Hook --}}
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
                        @endif

                        {{-- spacer --}}
                        <div class="grow flex flex-col-reverse">
                            <hr />
                        </div>

                        <x-layout.footer />
                    </div>
                </div>
            </div>
        </div>
    @endif

    @yield('page-scripts')
</body>

</html>
