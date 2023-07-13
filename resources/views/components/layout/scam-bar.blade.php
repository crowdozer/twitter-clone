<div class="flex flex-col gap-2">

    @if ($show_scam)
        {{-- The Scam™ --}}
        <div class="p-4 rounded-xl bg-stone-900">
            <h2 class="text-2xl font-bold">Get Verified™</h2>
            <p class="mt-4">It's a scam but you'll unlock paywalled™ features</p>
            <button class="p-2 bg-fuchsia-600 hover:bg-fuchsia-700 cursor-pointer rounded-full mt-6 px-4"
                aria-label="scam me" onclick="window.alert('(Judgement) come on, man')">
                scam me
            </button>
        </div>
    @endif

    @if ($show_hot)
        {{-- What's Hot™ --}}
        <div class="rounded-xl bg-stone-900">
            <div class="px-4 pt-4">
                <h2 class="text-2xl font-bold">What's Hot™</h2>
            </div>
            <div class="flex flex-col mt-4 mb-4">
                <x-whats-hot topic='#TweetHub' activity='24M tweets' href='/topic/TweetHub' />
                <x-whats-hot topic='#Crowdozer' activity='1.2M tweets' href='/topic/Crowdozer' />
                <x-whats-hot topic='Who is Crowdozer' activity='55K tweets' href='/search?q=Who%20is%20Crowdozer' />
            </div>
        </div>
    @endif

    @if ($show_not)
        {{-- Who's Not™ --}}
        <div class="rounded-xl bg-stone-900">
            <h2 class="px-4 pt-4 text-2xl font-bold">Who's Not™</h2>

            <div class="flex flex-col gap-4 mt-4 pb-4">
                <div class="px-4">
                    <x-whos-not id="whoisjoe" name="Joe Mama" />
                </div>
                <div class="px-4">
                    <x-whos-not id="petez" name="Pete Zahead" />
                </div>
                <div class="px-4">
                    <x-whos-not id="zuck" name="Specimen 6" />
                </div>
                <a class="hover:bg-stone-800 px-4 py-2 cursor-pointer" href="/the-outside-world" }}">
                    <p class="text-stone-500 font-bold">find more budz</p>
                </a>
            </div>
        </div>
    @endif

</div>
