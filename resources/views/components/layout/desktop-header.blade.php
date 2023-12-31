<div class="flex-col gap-2 h-full hidden lg:flex">
    <h1 class="text-2xl font-bold mb-2"><a class="text-fuchsia-500 hover:underline" href="/">TweetHub</a></h1>

    @if (Auth::check())
        <form id="search-form">
            <input
                class="self-center w-full bg-transparent border border-stone-800 hover:border-fuchsia-700 rounded-full p-2 px-4"
                placeholder="Search" name='search' required />
        </form>

        <div class="mt-8 flex flex-col gap-2">
            <h2 class="font-bold text-lg">Feeds</h2>

            <button class="w-full rounded-full text-left p-2 px-4 bg-fuchsia-950 hover:bg-fuchsia-900"
                aria-label="trendy topics feed">
                <i class="fas fa-arrow-trend-up mr-1 self-center w-8 text-center"></i>
                Trendy
            </button>

            <button class="w-full rounded-full text-left p-2 px-4 bg-none border text-stone-500 border-stone-800"
                aria-label="following feed" disabled>
                <i class="fa-solid fa-magnifying-glass w-8 text-center"></i>
                Following
            </button>

            <button class="w-full rounded-full text-left p-2 px-4 bg-none border text-stone-500 border-stone-800"
                aria-label="followers feed" disabled>
                <i class="fas fa-users mr-1 self-center  w-8 text-center"></i>
                Followers
            </button>
        </div>

        <div class="mt-8 flex flex-col gap-2">
            <h2 class="font-bold text-lg">Pages</h2>

            <a class="w-full rounded-full text-left p-2 px-4 bg-none  text-stone-500 hover:bg-stone-900 hover:text-white"
                href="/about">
                <i class="fas fa-info mr-1 self-center w-8 text-center"></i>
                About
            </a>
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

    {{-- Log in/Log out --}}
    @if (Auth::check())
        <a href="/u/{{ Auth::user()->username }}"
            class="self-center text-left p-2 w-full px-4 bg-transparent hover:bg-stone-900 rounded-full text-white hover:text-white">
            <span class="text-stone-500">
                as {{ '@' }}
            </span>
            <span class="font-bold -ml-1">
                {{ Auth::user()->username }}
            </span>
        </a>

        <button aria-label="log out" hx-trigger="click" hx-get="/api/auth/log-out"
            class="self-center text-left p-2 w-full px-4 bg-transparent hover:outline rounded-full hover:text-fuchsia-400">
            <i class="fas fa-right-from-bracket mr-2"></i>
            Log Out
        </button>
    @else
        <button aria-label="log in"
            class="self-center text-left p-2 w-full px-4 bg-transparent hover:outline rounded-full hover:text-fuchsia-400">
            <i class="fas fa-user-circle mr-2"></i>
            Log In
        </button>
    @endif
</div>

<script>
    $('#search-form').on('submit', function(e) {
        e.preventDefault()
        let value = $(this).find('input[name="search"]').val();

        window.location = '/search?q=' + encodeURIComponent(value)
    })
</script>
