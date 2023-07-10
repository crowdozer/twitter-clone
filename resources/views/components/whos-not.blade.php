@props(['id', 'name'])

<div class="flex flex-row gap-4">
    <a class="w-[36px] h-[36px] rounded-full overflow-hidden self-center" href="/u/{{ $id }}">
        <img src="https://api.dicebear.com/6.x/bottts/svg?seed={{ $name }}" alt="avatar"
            style="width: 36px; height: 36px" />
    </a>
    <div class="grow">
        <a class="-mt-1 text-white" href="/u/{{ $id }}">{{ $name }}</a>
        <p class="text-stone-500 -mt-1">{{ '@' }}{{ $id }}</p>
    </div>
    <div class="shrink-0 w-[36px]">
        <button class="bg-stone-800 w-[36px] h-[36px] self-center rounded-full hover:bg-stone-700">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>
