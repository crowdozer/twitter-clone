<nav class="fixed bottom-0 left-0 right-0 bg-stone-950 z-10">
    <hr />
    <div class="flex flex-row gap-2 mx-auto w-full p-2 pb-0 mb-2">
        <h1 class="text-2xl font-bold ml-2 self-center">
            <a class="text-fuchsia-500 hover:underline" href="/">TweetHub</a>
        </h1>
        <div class="grow"></div>
        <a aria-label="go to your profile" href="/u/{{ Auth::user()->username }}"
            class="rounded-full px-4 text-white hover:text-white text-center flex items-center border border-stone-700 active:text-fuchsia-500 h-10">
            <span class="inline-block mx-auto">
                <span class="text-stone-500">{{ '@' }}</span>
                <span class="font-bold -ml-1">
                    {{ Auth::user()->username }}
                </span>
            </span>
        </a>
        <a aria-label="log out" hx-trigger="click" hx-get="/api/auth/log-out"
            class="rounded-full text-white hover:text-white text-center flex items-center border border-stone-700 active:text-fuchsia-500 w-10 h-10">
            <span class="inline-block mx-auto">
                <i class="fas fa-right-from-bracket">
                </i>
            </span>
        </a>
    </div>
</nav>
