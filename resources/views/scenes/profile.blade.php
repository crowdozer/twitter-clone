@extends('layouts.app')

@section('title', "TweetHub @$id")

@section('content')
    <div class="relative mx-auto max-w-4xl pr-4">
        {{-- banner/pic --}}
        <div class="h-[200px] bg-stone-800 relative"
            style="background-image: url(https://picsum.photos/id/{{ $_banner_img }}/480/200); background-size: cover;">
            <div
                class="absolute -bottom-16 left-8 w-32 h-32 rounded-full bg-stone-950 border-stone-950 border-8 overflow-hidden">
                <img src="https://api.dicebear.com/6.x/bottts/svg?seed={{ $name }}" alt="avatar" class="w-32 h-32" />
            </div>
        </div>

        {{-- name, sticky --}}
        <div class="     bg-stone-950 sticky top-0 left-0 z-10">
            <h1 class="mt-20 mb-4 text-3xl font-bold">
                {{ $name }} <span
                    class="text-stone-500 font-normal text-xl">{{ '@' }}{{ $id }}</span>
            </h1>
        </div>

        <div class="relative">
            {{-- stats --}}
            <div class="ml-8">
                <p class="text-white whitespace-pre-wrap">{{ $bio }}</p>

                <p class="mt-4 text-stone-500"><i class="fas fa-calendar-alt mr-1"></i> {{ $joined }}</p>

                <div class="flex flex-row gap-4 mt-4">
                    <span>
                        <span class="font-bold">{{ number_format($followers) }}</span>
                        <span class="text-stone-500">Followers</span>
                    </span>
                    <span>
                        <span class="font-bold">{{ number_format($following) }}</span>
                        <span class="text-stone-500">Following</span>
                    </span>
                </div>
            </div>

            {{-- feed --}}
            <div class="mt-4 relative">
                <hr class="mt-4" />

                {{-- controls, sticky --}}
                <div class="bg-stone-950 pt-4 sticky top-9 left-0 z-10">
                    <div class="flex flex-row gap-4">
                        <a href="/u/{{ $id }}/tweets" @class([
                            'px-4 py-2 text-sm rounded-full font-bold text-white hover:text-white',
                            'bg-stone-900 hover:bg-fuchsia-600 active:bg-fuchsia-700' =>
                                $mode !== 'tweets',
                            'bg-fuchsia-600' => $mode === 'tweets',
                        ])>Tweets</a>
                        <a href="/u/{{ $id }}/replies" @class([
                            'px-4 py-2 text-sm rounded-full font-bold text-white hover:text-white',
                            'bg-stone-900 hover:bg-fuchsia-600 active:bg-fuchsia-700' =>
                                $mode !== 'replies',
                            'bg-fuchsia-600' => $mode === 'replies',
                        ])>Replies</a>
                        <a href="/u/{{ $id }}/likes" @class([
                            'px-4 py-2 text-sm rounded-full font-bold text-white hover:text-white',
                            'bg-stone-900 hover:bg-fuchsia-600 active:bg-fuchsia-700' =>
                                $mode !== 'likes',
                            'bg-fuchsia-600' => $mode === 'likes',
                        ])>Likes</a>
                    </div>

                    <hr class="mt-4" />
                </div>

                {{-- output --}}
                <div>
                    @if ($mode === 'likes')
                        <x-profile-likes :id="$id" :name="$name" />
                    @elseif ($mode === 'replies')
                        <x-profile-replies />
                    @elseif ($mode === 'tweets')
                        <x-profile-tweets :id="$id" :name="$name" />
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
