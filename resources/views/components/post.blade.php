<div id="{{ $scope }}" data-url="/post/{{ $id }}" class="pl-2 py-4">
    <div class="flex flex-row gap-4">
        {{-- avatar --}}
        <a class="w-[48px] h-[48px] rounded-full overflow-hidden" href="/u/{{ $author_id }}">
            <img src="https://api.dicebear.com/6.x/bottts/svg?seed={{ $author_id }}" alt="avatar"
                style="width: 48px; height: 48px" />
        </a>

        {{-- author --}}
        <div class="flex flex-col gap-0 -mt-1">
            <div>
                <a href="/u/{{ $author_id }}" class="text-lg text-white">
                    {{ $author }}
                </a>
                @if ($author_verified)
                    <i class="fa-solid fa-circle-check text-sm align-top mt-1 ml-1 text-blue-500"></i>
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
                @if ($is_bot)
                    <span class="px-2">·</span>
                    <span><i class="fa fa-robot self-center text-xs"></i> droid</span>
                @endif
            </div>
        </div>
    </div>

    <p class="mt-2 whitespace-pre-wrap">{{ $content }}</p>


    @if ($show_tags)
        @if (count($hashtags) >= 1)
            <div class="text-sm my-2">
                @foreach ($hashtags as $tag)
                    <a href="/topic/{{ $tag }}" class="text-stone-500 mr-1">
                        #{{ $tag }}
                    </a>
                @endforeach
            </div>
        @endif
    @endif

    @if ($has_image)
        <div class="p-4">
            <div class="rounded-xl w-full overflow-hidden min-h-[440px] bg-stone-900">
                <img src="https://picsum.photos/id/{{ $_img_id }}/480/480" loading="lazy" alt="Tweet Media" />
            </div>
        </div>
    @endif

    @if (Auth::check())
        <div class="grid grid-cols-3 mt-2">
            <a href="/post/{{ $id }}" aria-label="view tweet comments or comment"
                class="p-2 hover:bg-stone-900 text-center border-r border-stone-800">
                <i @class([
                    'mr-2 fa-comment',
                    'fas text-fuchsia-600' => $commented,
                    'far text-stone-500' => !$commented,
                ])></i>
                <span class="text-stone-500">
                    {{ number_format($comments) }}
                </span>
            </a>

            <button aria-label="share tweet" class="p-2 hover:bg-stone-900 text-center border-r border-stone-800">
                <i @class([
                    'mr-2 fa fa-retweet',
                    'text-green-600' => $shared,
                    'text-stone-500' => !$shared,
                ])></i>
                <span class="text-stone-500">
                    {{ number_format($shares) }}
                </span>
            </button>

            <button class="p-2 hover:bg-stone-900 text-center" aria-label="like tweet">
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
    @else
        <div class="grid grid-cols-3 mt-2">
            <a href="/post/{{ $id }}" aria-label="view tweet comments"
                class="p-2 hover:bg-stone-900 text-center border-r border-stone-800">
                <i class="mr-2 fa-comment far text-stone-500"></i>
                <span class="text-stone-500">
                    {{ number_format($comments) }}
                </span>
            </a>


            <div class="p-2 cursor-not-allowed text-center border-r border-stone-800">
                <i class="mr-2 fa fa-retweet text-stone-500"></i>
                <span class="text-stone-500">
                    {{ number_format($shares) }}
                </span>
            </div>

            <div class="p-2 cursor-not-allowed text-center">
                <i class="mr-2 fa-heart far text-stone-500"></i>
                <span class="text-stone-500">
                    {{ number_format($likes) }}
                </span>
            </div>
        </div>
    @endif
</div>
