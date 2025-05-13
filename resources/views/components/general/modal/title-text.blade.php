@props(['title' => 'Titulo', 'text' => 'este es un texto predefinido'])

<div>
    <flux:heading size="lg">{{ $title }}</flux:heading>
    <flux:text class="mt-2">{{ $text }}</flux:text>
</div>
