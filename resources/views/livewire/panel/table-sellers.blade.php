<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\SellerForm;
use App\Models\Seller;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new class extends Component {
    public SellerForm $form;
    public ?int $seller_id = null;
    public string $search = '';

    use WithPagination;

    public function with(): array
    {

        return [
            'sellers' => Seller::where('name', 'like', '%'.$this->search.'%')
                ->orWhere('lastname', 'like', '%'.$this->search.'%')
                ->orWhere('phone', 'like', '%'.$this->search.'%')
                ->orWhere(Seller::raw("CONCAT(name, ' ', lastname)"), 'like', '%'.$this->search.'%')
                ->orWhere(Seller::raw("CONCAT(name,'', lastname)"), 'like', '%'.$this->search.'%')
                ->paginate(10),
        ];
    }

    #[On('search-updated')]
    public function searchUpdated(string $search): void
    {
        $this->search = $search;
    }

    public function setSellerId(?int $id): void
    {
        $this->seller_id = $id;
        $seller = Seller::findOrFail($id);
        $this->form->setSeller($seller);
    }

    public function unsetSellerId(): void
    {
        $this->seller_id = null;
        $this->reset();
    }

    public function delete(?int $id): void
    {
        $this->form->delete($id);

        $this->dispatch('toast', [
            'title' => 'Eliminacion Completada!',
            'text' => 'Vendedor eliminado correctamente.',
            'icon' => 'success',
        ]);
    }

    public function save(): void
    {
        if ($this->seller_id !== null) {
            $this->form->update();

            $this->dispatch('toast', [
                'title' => 'Datos Actualizados!',
                'text' => 'Vendedor actualizado correctamente',
                'icon' => 'success',
            ]);
        } else {
            $this->form->store();

            $this->dispatch('toast', [
                'title' => 'Datos Guardados!',
                'text' => 'Vendedor creado correctamente.',
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
        'Nombre',
        'Apellido',
        'Telefono',
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

                            <flux:modal.trigger name="delete-sellers-{{ md5($seller->id) }}">
                                <flux:menu.item variant="danger" icon="trash">Eliminar</flux:menu.item>
                            </flux:modal.trigger>
                        </flux:menu>
                    </flux:dropdown>
                </x-general.table.row>
            </x-general.table.rows>

            <flux:modal wire:key="{{ $seller->id }}" name="delete-sellers-{{ md5($seller->id) }}" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Eliminar Vendedor</flux:heading>

                        <flux:text class="mt-2">
                            <p>Se eliminara el vendedor {{ $seller->name }}</p>
                        </flux:text>
                    </div>

                    <div class="flex gap-2">
                        <flux:spacer />

                        <flux:modal.close>
                            <flux:button variant="ghost">Cancelar</flux:button>
                        </flux:modal.close>

                        <flux:button variant="danger" @click="$wire.delete({{ $seller->id }})">Eliminar vendedor</flux:button>
                    </div>
                </div>
            </flux:modal>
        @endforeach
    </x-general.table.body>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $sellers->links() }}
    </div>

    <!-- Modal Form -->
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

    <!-- Toast -->
    <x-general.toast.body />
</div>
