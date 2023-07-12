@props(['shared', 'shares', 'scope'])

<button id="share-{{ $scope }}" aria-label="share tweet"
    class="p-2 hover:bg-stone-900 text-center border-r border-stone-800">
    <i @class([
        'mr-2 fa fa-retweet',
        'text-green-600' => $shared,
        'text-stone-500' => !$shared,
    ])></i>
    <span class="btn-share-count text-stone-500">
        {{ number_format($shares) }}
    </span>
</button>

<script>
    /**
     * ideally you just htmx this, but we're simming it
     */
    $('#share-{{ $scope }}').on('click', function() {
        const btn = $(this)
        const counter = btn.find('.btn-share-count')
        const icon = btn.find('i')
        const count = counter.text()
        const isShared = icon.hasClass('text-green-600')

        if (isShared) {
            icon.addClass('text-stone-500').removeClass('text-green-600')
            counter.text(Number(count) - 1)
        } else {
            icon.removeClass('text-stone-500').addClass('text-green-600')
            counter.text(Number(count) + 1)
        }
    })
</script>
