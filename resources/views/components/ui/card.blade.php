{{--
    Card Component

    @props([
        'href' => null,
        'hover' => false,
    ])

    Slots:
    - $header (optional)
    - $slot (body content)
    - $footer (optional)

    Usage:
    <x-ui.card>
        <x-slot:header>Card Header</x-slot:header>
        Card body content here
        <x-slot:footer>Card Footer</x-slot:footer>
    </x-ui.card>

    <x-ui.card hover href="/posts/1">
        Clickable card content
    </x-ui.card>
--}}

@props([
    'href' => null,
    'hover' => false,
])

@php
    $baseClasses = 'card overflow-hidden';
    $hoverClasses = $hover || $href ? 'transition-shadow duration-200 hover:shadow-md' : '';
    $classes = "$baseClasses $hoverClasses";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes . ' block']) }}>
        @isset($header)
            <div class="card-header">
                {{ $header }}
            </div>
        @endisset

        <div class="card-body">
            {{ $slot }}
        </div>

        @isset($footer)
            <div class="card-footer">
                {{ $footer }}
            </div>
        @endisset
    </a>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}>
        @isset($header)
            <div class="card-header">
                {{ $header }}
            </div>
        @endisset

        <div class="card-body">
            {{ $slot }}
        </div>

        @isset($footer)
            <div class="card-footer">
                {{ $footer }}
            </div>
        @endisset
    </div>
@endif
