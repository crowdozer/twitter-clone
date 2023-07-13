<div class="flex flex-col" id="post-feed">
    @foreach ($posts as $post)
        <x-post :post="$post" />

        @if (!$loop->last)
            <hr />
        @endif

        {{-- advertisement time --}}
        @if (($loop->index + 1) % 5 == 0 && !$loop->first)
            <x-feed-advertisement />
        @endif
    @endforeach

    {{-- infinite scroll hook --}}
    <div hx-get="{{ $infinitescrollurl }}" hx-trigger="intersect" hx-swap="outerHTML"
        hx-indicator="#feed-infinitescroll-loading" class="text-center p-2">
        ...
    </div>

    <div id="feed-infinitescroll-loading" class="htmx-indicator w-full h-[440px] bg-stone-800">

    </div>
</div>
