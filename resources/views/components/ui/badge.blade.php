{{--
    Badge Component

    @props([
        'variant' => 'primary', // primary, secondary, success, warning, error, neutral
        'size' => 'md', // sm, md
    ])

    Usage:
    <x-ui.badge>Default</x-ui.badge>
    <x-ui.badge variant="success">Active</x-ui.badge>
    <x-ui.badge variant="warning" size="sm">Pending</x-ui.badge>
--}}

@props([
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $baseClasses = 'inline-flex items-center font-medium rounded-full';

    $variantClasses = match($variant) {
        'primary' => 'bg-primary-100 text-primary-800',
        'secondary' => 'bg-secondary-100 text-secondary-800',
        'success' => 'bg-green-100 text-green-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'error' => 'bg-red-100 text-red-800',
        'neutral' => 'bg-neutral-100 text-neutral-800',
        default => 'bg-primary-100 text-primary-800',
    };

    $sizeClasses = match($size) {
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-0.5 text-xs',
        default => 'px-2.5 py-0.5 text-xs',
    };

    $classes = "$baseClasses $variantClasses $sizeClasses";
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
