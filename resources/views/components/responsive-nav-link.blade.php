@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active text-primary fw-bold'
            : 'nav-link text-dark';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
