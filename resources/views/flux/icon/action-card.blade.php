@php $attributes = $unescapedForwardedAttributes ?? $attributes; @endphp

@props([
    'variant' => 'outline',
])

@php
    $classes = Flux::classes('shrink-0 fill-current')
        ->add(match($variant) {
            'outline' => '[:where(&)]:size-6',
            'solid' => '[:where(&)]:size-6',
            'mini' => '[:where(&)]:size-5',
            'micro' => '[:where(&)]:size-4',
        });
@endphp

{{-- Your SVG code here: --}}
<svg {{ $attributes->class($classes) }} data-flux-icon aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 75">
    <polygon points="62.78 27.66 62.78 54.6 35.9 70.1 35.9 64.2 55.68 52.78 55.68 29.47 41.63 21.36 41.63 15.45 62.78 27.66"/>
    <polygon points="41.63 26.51 41.63 46.3 36.13 43.12 28.03 57.81 12.22 48.68 12.22 19.5 37.5 4.9 37.5 13.06 17.21 24.78 17.21 43.4 25.37 48.11 30.05 39.61 24.49 36.4 41.63 26.51"/>
</svg>
