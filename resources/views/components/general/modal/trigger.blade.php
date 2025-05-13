@props(['name' => 'dispatch', 'icon' => 'plus', 'text' => 'Crear'])

<flux:modal.trigger name="{{ $name }}">
    <flux:button {{ $attributes->merge(['class' => '']) }} icon="{{ $icon }}">{{ $text }}</flux:button>
</flux:modal.trigger>
