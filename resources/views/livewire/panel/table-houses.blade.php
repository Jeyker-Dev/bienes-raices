<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\HouseForm;
use App\Models\House;
use App\Models\Seller;
use Livewire\WithFileUploads;


new class extends Component {
    public HouseForm $form;
    public ?int $house_id = null;

    use WithFileUploads;

    public function with(): array
    {
        return [
            'houses' => House::all(),
            'sellers' => Seller::all(),
        ];
    }

    public function setHouseId(?int $id): void
    {
        $this->house_id = $id;
        $this->form->setHouse($this->house_id);
    }

    public function unsetHouseId(): void
    {
        $this->house_id = null;
        $this->form->reset();
    }

    public function delete(?int $id): void
    {
        $this->form->delete($id);

        $this->dispatch('toast', [
            'title' => 'Eliminacion Completada!',
            'text' => 'La csa se ha eliminado correctamente.',
            'icon' => 'success',
        ]);
    }

    public function save(): void
    {
        if ($this->house_id !== null) {
            $this->form->update();

            $this->dispatch('toast', [
                'title' => 'Actualizacion Completada!',
                'text' => 'La casa se ha actualizado correctamente.',
                'icon' => 'success',
            ]);
        } else {
            $this->form->store();

            $this->dispatch('toast', [
                'title' => 'Creacion Completada!',
                'text' => 'La casa se ha creado correctamente.',
                'icon' => 'success',
            ]);
        }
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
@endphp


<div>
    <!-- Search Input and Modal Trigger -->
    <div class="flex flex-col gap-y-8 sm:flex-row sm:justify-between my-4 md:w-10/12 lg:w-9/12 mx-auto">
        <livewire:utilities.search />

        <x-general.modal.trigger
            class="max-w-2xs"
            icon="plus"
            text="Crear"
            name="houses-modal"
        />
    </div>

    <!-- House Table -->
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
                    {{ $house->id }}
                </x-general.table.row>

                <x-general.table.row rowClass=" {{ $rowClass }}">
                    {{ $house->title }}
                </x-general.table.row>

                <x-general.table.row rowClass="flex justify-center items-center {{ $rowClass }}">
                    <img src="{{ asset('storage/'.$house->image) }}" alt="" class="w-28 h-28 object-cover object-center">
                </x-general.table.row>

                <x-general.table.row rowClass="{{ $rowClass }}">
                    $ {{ $house->price }}
                </x-general.table.row>

                <x-general.table.row rowClass="{{ $rowClass }}">
                    <flux:dropdown>
                        <flux:button icon:trailing="ellipsis-horizontal"></flux:button>

                        <flux:menu>
                            <flux:modal.trigger name="houses-modal">
                                <flux:menu.item icon="arrow-path" @click="$wire.setHouseId({{ $house->id }})">Editar</flux:menu.item>
                            </flux:modal.trigger>
                            <flux:modal.trigger name="delete-houses-{{ md5($house->id) }}">
                                <flux:menu.item variant="danger" icon="trash">Eliminar</flux:menu.item>
                            </flux:modal.trigger>
                        </flux:menu>
                    </flux:dropdown>
                </x-general.table.row>
            </x-general.table.rows>

            <flux:modal wire:key="{{ $house->id }}" name="delete-houses-{{ md5($house->id) }}" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Eliminar Casa</flux:heading>

                        <flux:text class="mt-2">
                            <p>Se eliminara la casa {{ $house->title }}</p>
                        </flux:text>
                    </div>

                    <div class="flex justify-between">
                        <flux:modal.close>
                            <flux:button variant="ghost">Cancelar</flux:button>
                        </flux:modal.close>

                        <flux:button variant="danger" @click="$wire.delete({{ $house->id }})">Eliminar Casa</flux:button>
                    </div>
                </div>
            </flux:modal>
        @endforeach
    </x-general.table.body>

    <!-- Modal Form -->
    <x-general.modal.body close="unsetHouseId" name="houses-modal" submit="save" modalClass="w-full">
        <x-general.modal.content >
            <x-general.modal.title-text
                title="{{ $house_id ? 'Editar' : 'Crear' }} Casas"
                text="Agrega los datos de la casa"
            />

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

            @if($this->form->image)
                <img src="{{ $this->form->image->temporaryUrl() }}" alt="" class="w-64 h-64 object-cover object-center border border-black shadow-xl">
            @elseif($this->form->image_path)
                <img src="{{ $this->form->image_path }}" alt="" class="w-64 h-64 object-cover object-center border border-black shadow-xl">
            @endif

            <flux:textarea
                label="Descripcion"
                placeholder="This house has 3 bedrooms, 4 bath and a garage."
                wire:model="form.description"
            />

            <flux:input
                wire:model="form.bedroom"
                label="Cuartos"
                placeholder="6"
            />

            <flux:input
                wire:model="form.bath"
                label="Baños"
                placeholder="4"
            />

            <flux:select wire:model="form.seller">
                <flux:select.option value="" hidden selected>Escojer Vendedor</flux:select.option>
                @foreach($sellers as $seller)
                    <flux:select.option value="{{ $seller->id }}">{{ $seller->name.' '.$seller->lastname }}</flux:select.option>
                @endforeach
            </flux:select>

            <x-general.modal.buttons
                buttonText="{{ $house_id ? 'Editar' : 'Crear' }} Casa"
            />
        </x-general.modal.content>
    </x-general.modal.body>

    <!-- Toast -->
    <x-general.toast.body />
</div>
