<div id="{{ $scope }}" data-url="/post/{{ $id }}" class="pl-2 pr-4 py-4 cursor-pointer ">
    <div class="flex flex-row gap-4">
        {{-- avatar --}}
        <a class="w-[48px] h-[48px] rounded-full overflow-hidden" href="/u/{{ $author_id }}">
            <img src="https://api.dicebear.com/6.x/bottts/svg?seed={{ $author }}" alt="avatar"
                style="width: 48px; height: 48px" />
        </a>

        {{-- author --}}
        <div class="flex flex-col gap-0 -mt-1">
            <div>
                <a href="/u/{{ $author_id }}" class="text-lg">
                    {{ $author }}
                </a>
                @if ($author_verified)
                    <i class="fa-solid fa-circle-check text-sm align-top mt-1 text-stone-500"></i>
                @endif
            </div>
            <div class="text-stone-500 text-sm flex flex-row -mt-1">
                <span>{{ '@' }}{{ $author_id }}</span>
                <span class="px-2">·</span>
                <span>{{ $posted_on }}</span>
                @if ($show_views)
                    <span class="px-2">·</span>
                    <span><i class="far fa-eye self-center text-xs"></i> {{ number_format($views) }}</span>
                @endif
            </div>
        </div>
    </div>

    <p class="mt-2 whitespace-pre-wrap">{{ $content }}</p>

    @if ($show_tags)
        @if (count($hashtags) >= 1)
            <div class="text-sm">
                @foreach ($hashtags as $tag)
                    <a href="/topic/{{ $tag }}" class="text-stone-500 mr-1">
                        #{{ $tag }}
                    </a>
                @endforeach
            </div>
        @endif
    @endif


    <div class="grid grid-cols-3 mt-2">
        <a href="/post/{{ $id }}" class="p-2 hover:bg-stone-900 text-center border-r border-stone-800">
            <i @class([
                'mr-2 fa-comment',
                'fas text-fuchsia-600' => $commented,
                'far text-stone-500' => !$commented,
            ])></i>
            <span class="text-stone-500">
                {{ number_format($comments) }}
            </span>
        </a>

        <button class="p-2 hover:bg-stone-900 text-center border-r border-stone-800">
            <i @class([
                'mr-2 fa fa-retweet',
                'text-green-600' => $shared,
                'text-stone-500' => !$shared,
            ])></i>
            <span class="text-stone-500">
                {{ number_format($shares) }}
            </span>
        </button>

        <button class="p-2 hover:bg-stone-900 text-center">
            <i @class([
                'mr-2 fa-heart',
                'fas text-red-800' => $liked,
                'far text-stone-500' => !$liked,
            ])></i>
            <span class="text-stone-500">
                {{ number_format($likes) }}
            </span>
        </button>
    </div>
</div>
