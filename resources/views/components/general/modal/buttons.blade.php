@props(['delete' => null, 'buttonDeleteClass' => '', 'buttonDeleteText' => 'Eliminar', 'buttonClass' => '', 'buttonText' => 'Crear'])

<div {{ $attributes->merge(['class' => 'flex']) }}>
    <flux:spacer/>
    @if ($delete)
        <flux:button variant="danger" class="{{ $buttonDeleteClass }}">{{ $buttonDeleteText }}</flux:button>
    @endif

    <flux:button type="submit" variant="primary" class="{{ $buttonClass }}">{{ $buttonText }}</flux:button>
</div>
