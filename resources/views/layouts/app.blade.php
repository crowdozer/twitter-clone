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
    <div class="max-w-[1080px] mx-auto h-full">
        <div class="flex flex-row h-full p-4">
            {{-- first column --}}
            <header role="banner" class="w-[240px] pb-16">
                <div class="flex flex-col gap-2 h-full">
                    <h1 class="text-2xl font-bold">tweethub</h1>

                    {{-- spacer --}}
                    <div class="grow flex flex-col-reverse">
                        <hr />
                    </div>

                    <div class="pr-4">
                        <button
                            class="self-center text-left p-2 w-full px-4 bg-transparent hover:outline rounded-full hover:text-fuchsia-400">
                            <i class="fas fa-user mr-2"></i>
                            Account
                        </button>
                    </div>
                </div>
            </header>

            {{-- second column --}}
            <main class="grow">
                <!-- This is where the content of your child views will be injected -->
                @yield('content')
            </main>

            {{-- third column --}}
            <div class="w-[240px] pb-16">

                <div class="flex flex-col gap-2 h-full">
                    <input class="self-center bg-transparent hover:outline rounded-full p-1 px-4"
                        placeholder="Search" />

                    {{-- spacer --}}
                    <div class="grow flex flex-col-reverse">
                        <hr />
                    </div>

                    <footer class="pl-4">
                        <a href="https://www.github.com/crowdozer">view on github</a>
                        <p class="text-stone-500">(c) me never</p>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <!-- Your footer content here -->
    </footer>
</body>

</html>
