<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\SellerForm;
use App\Models\Seller;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new class extends Component {
    public SellerForm $form;
    public ?int $seller_id = null;

    use WithPagination;

    public function with(): array
    {
        return [
            'sellers' => Seller::paginate(10),
        ];
    }

    public function setSellerId(?int $id): void
    {
        $this->seller_id = $id;
    }

    public function unsetSellerId(): void
    {
        $this->seller_id = null;
    }

    public function save(): void
    {
        if ($this->seller_id) {
            $this->form->update();
        }

        $this->form->store();
    }
}; ?>

@php
    $rowClass = 'text-center';

    $headers =
    [
        'ID',
        'Nombre',
        'Apellido',
        'Telefono',
        'Acciones',
    ];
@endphp

<div>
    <!-- Modal Trigger -->
    <div class="flex justify-end my-4 md:w-10/12 lg:w-9/12 mx-auto">
        <x-general.modal.trigger
        class=""
        icon="plus"
        text="Crear"
        name="sellers-modal"
        />
    </div>

    <!-- Table -->
    <x-general.table.body tableClass="">
        <x-general.table.columns columnsClass="">
            @foreach($headers as $header)
                <x-general.table.column columnClass="">
                    {{ $header }}
                </x-general.table.column>
            @endforeach
        </x-general.table.columns>
        @foreach($sellers as $seller)
            <x-general.table.rows rowsClass="">
                <x-general.table.row rowClass="{{ $rowClass }}">
                    {{ $seller->id }}
                </x-general.table.row>

                <x-general.table.row rowClass=" {{ $rowClass }}">
                    {{ $seller->name }}
                </x-general.table.row>

                <x-general.table.row rowClass="{{ $rowClass }}">
                    {{ $seller->lastname }}
                </x-general.table.row>

                <x-general.table.row rowClass="{{ $rowClass }}">
                    {{ $seller->phone }}
                </x-general.table.row>

                <x-general.table.row rowClass="{{ $rowClass }}">
                    <flux:dropdown>
                        <flux:button icon:trailing="ellipsis-horizontal"></flux:button>

                        <flux:menu>
                            <flux:modal.trigger name="sellers-modal">
                                <flux:menu.item icon="arrow-path" @click="$wire.setSellerId({{ $seller->id }})">Editar</flux:menu.item>
                            </flux:modal.trigger>

                            <flux:menu.item variant="danger" icon="trash">Eliminar</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </x-general.table.row>
            </x-general.table.rows>
        @endforeach
    </x-general.table.body>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $sellers->links() }}
    </div>

    <!-- Modal -->
    <x-general.modal.body close="unsetSellerId" name="sellers-modal" submit="save" modalClass="w-full">
        <x-general.modal.content >
            <x-general.modal.title-text
                title="{{ $seller_id ? 'Editar' : 'Crear' }} Vendedor"
                text="Agrega los datos del vendedor"
            />

            <flux:input
                wire:model="form.name"
                label="Nombre"
                placeholder="Fernando"
            />

            <flux:input
                wire:model="form.lastname"
                label="Apellido"
                placeholder="Rodriguez"
            />

            <flux:input
                wire:model="form.phone"
                label="Telefono"
                placeholder="04245652392"
            />

            <x-general.modal.buttons
            buttonText="{{ $seller_id ? 'Editar' : 'Crear' }} Vendedor"
            />
        </x-general.modal.content>
    </x-general.modal.body>
</div>
