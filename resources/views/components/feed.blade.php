<div class="flex flex-col">
    @foreach ($posts as $post)
        <x-post :post="$post" />
        @if (!$loop->last)
            <hr />
        @endif
    @endforeach
</div>
