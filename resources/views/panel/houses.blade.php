<x-layouts.app :title="__('Houses')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <x-general.title titleClass="!text-black text-center p-4">
            Administrador de Casas
        </x-general.title>

        <livewire:panel.table-houses />
    </div>
</x-layouts.app>
