<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\SellerForm;
use App\Models\Seller;
use Livewire\WithPagination;

new class extends Component {
    public SellerForm $form;

    use WithPagination;

    public function with(): array
    {
        return [
            'sellers' => Seller::paginate(10),
        ];
    }

    public function save(): void
    {
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

    <div class="flex justify-end my-4 md:w-10/12 lg:w-9/12 mx-auto">
        <flux:modal.trigger name="create-seller">
            <flux:button icon="plus">Crear</flux:button>
        </flux:modal.trigger>
    </div>

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
                            <flux:menu.item icon="arrow-path">Editar</flux:menu.item>
                            <flux:menu.item variant="danger" icon="trash">Eliminar</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </x-general.table.row>
            </x-general.table.rows>
        @endforeach
    </x-general.table.body>

    <div class="mt-4">
        {{ $sellers->links() }}
    </div>

    <flux:modal name="create-seller" class="w-11/12">
        <form wire:submit.prevent="save" class="w-full">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Crear Vendedor</flux:heading>
                    <flux:text class="mt-2">Agrega los datos del vendedor</flux:text>
                </div>

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

                <div class="flex">
                    <flux:spacer/>

                    <flux:button type="submit" variant="primary">Crear Vendedor</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
