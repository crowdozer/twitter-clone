<div class="flex flex-row gap-4">
    <div class="rounded-full overflow-hidden w-[36px] h-[36px] bg-red-500 self-center shrink-0 w-[36px]">
        <a href="/u/{{ $id }}">
            <img src="https://api.dicebear.com/6.x/bottts/svg?seed={{ $id }}" alt="avatar"
                style="width: 36px; height: 36px" />
        </a>
    </div>
    <div class="grow">
        <a class="-mt-1" href="/u/{{ $id }}">{{ $name }}</a>
        <p class="text-stone-500 -mt-1">{{ '@' }}{{ $id }}</p>
    </div>
    <div class="shrink-0 w-[36px]">
        <button class="bg-stone-800 w-[36px] h-[36px] self-center rounded-full ">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>
