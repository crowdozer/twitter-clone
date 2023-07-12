@props(['liked', 'likes', 'scope'])

<button id="like-{{ $scope }}" class="btn-like-tweet p-2 hover:bg-stone-900 text-center" aria-label="like tweet">
    <i @class([
        'mr-2 fa-heart',
        'fas text-red-800' => $liked,
        'far text-stone-500' => !$liked,
    ])></i>
    <span class="btn-like-count text-stone-500">
        {{ number_format($likes) }}
    </span>
</button>

<script>
    /**
     * ideally you just htmx this, but we're simming it
     */
    $('#like-{{ $scope }}').on('click', function() {
        const btn = $(this)
        const counter = btn.find('.btn-like-count')
        const icon = btn.find('i')
        const count = counter.text()
        const isLiked = icon.hasClass('fas text-red-800')

        if (isLiked) {
            icon
                .removeClass('fas text-red-800')
                .addClass('far text-stone-500')
            counter.text(Number(count) - 1)
        } else {
            icon
                .addClass('fas text-red-800')
                .removeClass('far text-stone-500')
            counter.text(Number(count) + 1)

        }
    })
</script>
