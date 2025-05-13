@props(['name' => 'dispatch', 'submit' => null, 'modalClass' => 'w-full', 'close' => ''])

<flux:modal @close="{{ $close }}" name="{{ $name }}" class="{{ $modalClass }}">
    @if ($submit)
        <form wire:submit.prevent="save" class="w-full">
            {{ $slot }}
        </form>
    @else
        {{ $slot }}
    @endif
</flux:modal>
