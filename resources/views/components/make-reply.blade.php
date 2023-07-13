<form hx-post="/api/posts/reply" hx-trigger="submit" hx-target="#post-feed" hx-swap="beforebegin"
    hx-on="htmx:afterRequest: $('#make-reply-input').val('')">
    @csrf
    <div class="relative">
        <textarea id="make-reply-input" name="comment" placeholder="{{ $quote }}"
            class="w-full min-h-[92px] p-2 pr-16 rounded-xl bg-stone-900" type="text" rows="4" value="" required></textarea>
        <button type="submit" aria-label="submit reply"
            class="absolute bottom-4 right-4 bg-stone-800 p-2 rounded-full w-[36px] h-[36px] group">
            <i class="fas fa-plane align-top mt-0.5 group-hover:text-fuchsia-500"></i>
        </button>
    </div>
</form>
