<header role="banner" class="contents">
    <div class="flex flex-col gap-2 h-full">
        <h1 class="text-2xl font-bold mb-2"><a class="text-fuchsia-500 hover:underline" href="/">TweetHub</a></h1>

        @if (Auth::check())
            <input
                class="self-center w-full bg-transparent border border-stone-800 hover:border-fuchsia-700 rounded-full p-2 px-4"
                placeholder="Search" />

            <div class="mt-8 flex flex-col gap-2">
                <h2 class="font-bold text-lg">Feeds</h2>

                <button class="w-full rounded-full text-left p-2 px-4 bg-fuchsia-950 hover:bg-fuchsia-900">
                    <i class="fas fa-arrow-trend-up mr-1 self-center w-8 text-center"></i>
                    Trendy
                </button>

                <button class="w-full rounded-full text-left p-2 px-4 bg-none border text-stone-500 border-stone-800"
                    disabled>
                    <i class="fa-solid fa-magnifying-glass w-8 text-center"></i>
                    Following
                </button>

                <button class="w-full rounded-full text-left p-2 px-4 bg-none border text-stone-500 border-stone-800"
                    disabled>
                    <i class="fas fa-users mr-1 self-center  w-8 text-center"></i>
                    Followers
                </button>

                {{-- custom feeds --}}
                @foreach ($custom_feeds as $feed)
                    <div>
                        not implemented
                    </div>
                @endforeach

                <button class="w-full rounded-full text-left p-2 px-4 bg-none border text-stone-500 border-stone-800"
                    disabled>
                    <i class="fas fa-plus mr-1 self-center w-8 text-center"></i>
                    New Feed
                </button>
            </div>
        @else
            <div class="text-stone-500 px-4 py-2 rounded-full border border-stone-700">
                <i class="fas fa-lock mr-2"></i>
                Incognito
            </div>
        @endif

        {{-- spacer --}}
        <div class="grow flex flex-col-reverse">
            <hr />
        </div>

        @if (Auth::check())
            <button
                class="self-center text-left p-2 w-full px-4 bg-transparent hover:outline rounded-full hover:text-fuchsia-400">
                <i class="fas fa-user mr-2"></i>
                Account
            </button>
        @else
            <button
                class="self-center text-left p-2 w-full px-4 bg-transparent hover:outline rounded-full hover:text-fuchsia-400">
                <i class="fas fa-user-circle mr-2"></i>
                Log In
            </button>
        @endif
    </div>
</header>
