{{--
    Avatar Component

    @props([
        'src' => null,
        'alt' => '',
        'size' => 'md', // sm, md, lg, xl
        'initials' => null,
    ])

    Usage:
    <x-ui.avatar src="/path/to/image.jpg" alt="User Name" />
    <x-ui.avatar initials="JD" size="lg" />
--}}

@props([
    'src' => null,
    'alt' => '',
    'size' => 'md',
    'initials' => null,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'h-8 w-8 text-xs',
        'md' => 'h-10 w-10 text-sm',
        'lg' => 'h-12 w-12 text-base',
        'xl' => 'h-16 w-16 text-lg',
        default => 'h-10 w-10 text-sm',
    };

    $classes = "inline-flex items-center justify-center overflow-hidden rounded-full bg-neutral-200 font-medium text-neutral-600 $sizeClasses";
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover">
    @elseif($initials)
        {{ $initials }}
    @else
        <svg xmlns="http://www.w3.org/2000/svg" class="h-1/2 w-1/2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
        </svg>
    @endif
</span>
