<!DOCTYPE html>
<html>

<head>
    <title>TweetHub</title>

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
                    <x-scam-bar />

                    {{-- spacer --}}
                    <div class="grow flex flex-col-reverse">
                        <hr />
                    </div>

                    <x-layout.footer />
                </div>
            </div>
        </div>
    </div>
</body>

</html>
