@props([
    'name',
    'show' => false,
    'maxWidth' => 'lg'
])

@php
$maxWidth = match ($maxWidth) {
    'sm' => 'modal-sm',
    'md' => 'modal-md',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    default => 'modal-lg',
};
@endphp

<div
    x-data="{ show: @js($show) }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('modal-open');
        } else {
            document.body.classList.remove('modal-open');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-show="show"
    class="modal fade show"
    tabindex="-1"
    role="dialog"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div class="modal-dialog {{ $maxWidth }}" role="document">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
