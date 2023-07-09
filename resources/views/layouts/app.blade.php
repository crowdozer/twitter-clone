<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="h-screen w-screen overflow-hidden bg-stone-950 text-white">
    <div class="max-w-[1024px] mx-auto h-full">
        <div class="flex flex-row h-full p-4">
            {{-- first column --}}
            <div class="w-[240px] shrink-0 pb-16 pr-2">
                <x-layout.header />
            </div>

            {{-- second column --}}
            <main class="grow">
                <!-- This is where the content of your child views will be injected -->
                @yield('content')
            </main>

            {{-- third column --}}
            <div class="w-[240px] shrink-0 pb-16 pl-2">

                <div class="flex flex-col gap-2 h-full">

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
