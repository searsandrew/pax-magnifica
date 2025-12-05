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

<svg {{ $attributes->class($classes) }} data-flux-icon aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 75">
    <path d="M43,1.5l-21.8,4.7-4.8,11.7,3.6,2.2,1,.6,10.9,6.6,21.8-4.7.2-.6,1-2.3,3.6-8.8L43,1.5ZM53.3,18.6l-1,2.3-.2.4-19.6,4-9.7-5.6-2.1-1.2-2.1-1.2,4.3-9.9,19.6-4,13.9,8-3.2,7.2Z"/>
    <polygon points="58.6 10.9 58.6 21.9 57.6 24.2 53.7 33.5 52.4 36.7 32 41.1 16.4 31.7 16.4 17.8 20.1 20 21 20.6 32 27.2 53.7 22.6 54 22 54.9 19.7 58.6 10.9"/>

    <polygon points="58.6 27.1 58.6 38.1 57.6 40.4 53.7 49.7 52.4 52.9 32 57.3 16.4 47.9 16.4 34 20.1 36.2 21 36.8 32 43.4 53.7 38.8 54 38.2 54.9 35.9 58.6 27.1"/>
    <polygon points="58.6 43.3 58.6 54.3 57.6 56.6 53.7 65.9 52.4 69.1 32 73.5 16.4 64.1 16.4 50.2 20.1 52.4 21 53 32 59.6 53.7 55 54 54.4 54.9 52.1 58.6 43.3"/>
    <
</svg>
