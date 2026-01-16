{{--
    Button Component

    @props([
        'variant' => 'primary', // primary, secondary, outline, ghost
        'size' => 'md', // sm, md, lg
        'type' => 'button',
        'href' => null,
        'disabled' => false,
    ])

    Usage:
    <x-ui.button>Click me</x-ui.button>
    <x-ui.button variant="outline" size="sm">Outline</x-ui.button>
    <x-ui.button href="/path">Link Button</x-ui.button>
--}}

@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null,
    'disabled' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50';

    $variantClasses = match($variant) {
        'primary' => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
        'secondary' => 'bg-secondary-600 text-white hover:bg-secondary-700 focus:ring-secondary-500',
        'outline' => 'border border-neutral-300 bg-white text-neutral-700 hover:bg-neutral-50 focus:ring-primary-500',
        'ghost' => 'bg-transparent text-neutral-700 hover:bg-neutral-100 focus:ring-neutral-500',
        'danger' => 'bg-error-600 text-white hover:bg-red-700 focus:ring-red-500',
        default => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
    };

    $sizeClasses = match($size) {
        'sm' => 'rounded-md px-3 py-1.5 text-xs',
        'md' => 'rounded-lg px-4 py-2 text-sm',
        'lg' => 'rounded-lg px-6 py-3 text-base',
        default => 'rounded-lg px-4 py-2 text-sm',
    };

    $classes = "$baseClasses $variantClasses $sizeClasses";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
        {{ $slot }}
    </button>
@endif
