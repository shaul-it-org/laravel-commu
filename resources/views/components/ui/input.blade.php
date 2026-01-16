{{--
    Input Component

    @props([
        'type' => 'text',
        'name' => null,
        'label' => null,
        'placeholder' => '',
        'error' => null,
        'hint' => null,
    ])

    Usage:
    <x-ui.input name="email" label="Email" type="email" placeholder="Enter your email" />
    <x-ui.input name="password" label="Password" type="password" error="Password is required" />
--}}

@props([
    'type' => 'text',
    'name' => null,
    'label' => null,
    'placeholder' => '',
    'error' => null,
    'hint' => null,
])

@php
    $inputClasses = $error
        ? 'input input-error'
        : 'input';
@endphp

<div {{ $attributes->only('class')->merge(['class' => 'w-full']) }}>
    @if($label)
        <label @if($name) for="{{ $name }}" @endif class="mb-1.5 block text-sm font-medium text-neutral-700">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        placeholder="{{ $placeholder }}"
        {{ $attributes->except('class')->merge(['class' => $inputClasses]) }}
    >

    @if($error)
        <p class="mt-1.5 text-sm text-error-600">{{ $error }}</p>
    @elseif($hint)
        <p class="mt-1.5 text-sm text-neutral-500">{{ $hint }}</p>
    @endif
</div>
