<div class="flex flex-col">
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
</div>
