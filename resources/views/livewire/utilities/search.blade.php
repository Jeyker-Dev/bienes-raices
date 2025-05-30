<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $search = '';
    public ?string $inputPlaceholder = '';

    public function updatedSearch(): void
    {
        $this->dispatch('search-updated', search: $this->search);
    }
}; ?>

<div>
    <flux:input icon="magnifying-glass" placeholder="{{ $inputPlaceholder }}" clearable wire:model.live.debounce.100ms="search" class="icon-black max-w-2xs" />
</div>
