<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\HouseForm;


new class extends Component {
    public HouseForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->form->store();
    }
}; ?>

@php
    $rowClass = 'text-center';

    $headers =
    [
        'ID',
        'Titulo',
        'Imagen',
        'Precio',
        'Acciones',
    ];

    $houses =
    [
       [
            'id' => '1',
        'titulo' => 'Cabaña',
        'imagen' => 'img/destacada.jpg',
        'precio' => '1000.00',
        'acciones' => 'Crear'
        ],
        [
            'id' => '2',
        'titulo' => 'Departamento',
        'imagen' => 'img/destacada2.jpg',
        'precio' => '2000.00',
        'acciones' => 'Crear'
        ],
    ];
@endphp


<div>
    <x-general.table.body tableClass="">
        <x-general.table.columns columnsClass="">
            @foreach($headers as $header)
                <x-general.table.column columnClass="">
                    {{ $header }}
                </x-general.table.column>
            @endforeach
        </x-general.table.columns>
        @foreach($houses as $house)
            <x-general.table.rows rowsClass="">
                <x-general.table.row rowClass="{{ $rowClass }}">
                    {{ $house['id'] }}
                </x-general.table.row>

                <x-general.table.row rowClass=" {{ $rowClass }}">
                    {{ $house['titulo'] }}
                </x-general.table.row>

                <x-general.table.row rowClass="flex justify-center items-center {{ $rowClass }}">
                    <img src="{{ asset($house['imagen']) }}" alt="" class="w-28 h-28 object-cover object-center">
                </x-general.table.row>

                <x-general.table.row rowClass="{{ $rowClass }}">
                    $ {{ $house['precio'] }}
                </x-general.table.row>

                <x-general.table.row rowClass="{{ $rowClass }}">
                    <flux:dropdown>
                        <flux:button icon:trailing="ellipsis-horizontal"></flux:button>

                        <flux:menu>
                            <flux:modal.trigger name="edit-profile">
                                <flux:menu.item icon="plus">Crear</flux:menu.item>
                            </flux:modal.trigger>
                            <flux:menu.item icon="arrow-path">Editar</flux:menu.item>
                            <flux:menu.item variant="danger" icon="trash">Eliminar</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </x-general.table.row>
            </x-general.table.rows>
        @endforeach
    </x-general.table.body>

    <flux:modal name="edit-profile" class="w-11/12">
        <form wire:submit.prevent="save" class="w-full">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Crear casas</flux:heading>
                    <flux:text class="mt-2">Agrega los datos de la casa.</flux:text>
                </div>

                <flux:input
                    wire:model="form.title"
                    label="Titulo"
                    placeholder="Cabaña con balcon"
                />

                <flux:input
                    wire:model="form.price"
                    label="Precio"
                    placeholder="$99.99"
                />

                <flux:input
                    wire:model="form.image"
                    type="file" label="Imagen"
                />

                <flux:textarea
                    label="Description"
                    placeholder="This house has 3 bedrooms, 4 bath and a garage."
                    wire:model="form.description"
                />

                <flux:input
                    wire:model="form.bedroom"
                    label="Bedrooms"
                    placeholder="6"
                />

                <flux:input
                    wire:model="form.bath"
                    label="Baths"
                    placeholder="4"
                />

                <flux:select wire:model="form.seller" placeholder="Choose seller...">
                    <flux:select.option>Jeyker</flux:select.option>
                    <flux:select.option>Fernando</flux:select.option>
                </flux:select>

                <div class="flex">
                    <flux:spacer/>

                    <flux:button type="submit" variant="primary">Crear Propiedad</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
