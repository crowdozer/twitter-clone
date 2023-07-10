<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
        integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="h-screen w-screen overflow-hidden bg-stone-950 text-white">
    <div class="max-w-[1100px] mx-auto h-full">
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

                    {{-- The Scam™ --}}
                    <div class="p-4 rounded-xl bg-stone-900">
                        <h2 class="text-2xl font-bold">Get Verified</h2>
                        <p class="mt-4">It's a scam but you'll unlock paywalled™ features</p>
                        <button class="p-2 bg-fuchsia-600 hover:bg-fuchsia-700 cursor-pointer rounded-full mt-6 px-4"
                            onclick="window.alert('(Judgement) come on, man')">
                            scam me
                        </button>
                    </div>

                    {{-- What's Hot™ --}}
                    <div class="rounded-xl bg-stone-900">
                        <div class="px-4 pt-4">
                            <h2 class="text-2xl font-bold">What's Hot™</h2>
                        </div>
                        <div class="flex flex-col mt-4 mb-4">
                            <x-whats-hot topic='TweetHub' activity='24M tweets' />
                            <x-whats-hot topic='Crowdozer' activity='1.2M tweets' />
                            <x-whats-hot topic='Who is Crowdozer' activity='55K tweets' />
                        </div>
                    </div>

                    {{-- Who's Not™ --}}
                    <div class="p-4 rounded-xl bg-stone-900">
                        <h2 class="text-2xl font-bold">Who's Not™</h2>

                        <div class="flex flex-col gap-4 mt-4">
                            <x-whos-not id="lemonees" name="Lemonees" />
                            <x-whos-not id="zuck" name="The Zuck" />
                            <x-whos-not id="pete" name="Pete Zahead" />
                        </div>
                    </div>

                    {{-- spacer --}}
                    <div class="grow flex flex-col-reverse">
                        <hr />
                    </div>

                    <x-layout.footer />
                </div>
            </div>
        </div>
    </div>

    <footer>
        <!-- Your footer content here -->
    </footer>
</body>

</html>
