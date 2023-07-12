@props(['alignment' => 'text-left', 'start' => true, 'end' => false, 'message'])

<p class="{{ $alignment }} text-sm">
    @if ($start)
        <span class="text-stone-500">- </span>
    @endif
    <span class="text-red-500">{{ $message }}</span>

    @if ($end)
        <span class="text-stone-500"> -</span>
    @endif
</p>
