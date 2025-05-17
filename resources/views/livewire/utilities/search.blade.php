<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $search = '';

    public function updatedSearch(): void
    {
        $this->dispatch('search-updated', search: $this->search);
    }
}; ?>

<div>
    <flux:input icon="magnifying-glass" placeholder="Search Sellers" clearable wire:model.live.debounce.500ms="search" class="icon-black" />
</div>
