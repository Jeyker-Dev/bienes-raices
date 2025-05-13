<x-layouts.app :title="__('Sellers')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <x-general.title titleClass="!text-black text-center p-4">
            Administrador de Vendedores
        </x-general.title>

        <livewire:panel.table-sellers />
    </div>
</x-layouts.app>
