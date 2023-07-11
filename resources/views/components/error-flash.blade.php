@props(['alignment' => 'text-left', 'start' => true, 'end' => false, 'message'])

<p class="{{ $alignment }}">
    @if ($start)
        <span class="text-fuchsia-500">- </span>
    @endif
    <span class="text-stone-500">{{ $message }}</span>

    @if ($end)
        <span class="text-fuchsia-500"> -</span>
    @endif
</p>
