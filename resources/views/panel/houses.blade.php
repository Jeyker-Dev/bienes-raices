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

<x-layouts.app :title="__('Houses')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <x-general.title titleClass="!text-black text-center p-4">
            Administrador de Casas
        </x-general.title>

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
                                <flux:menu.item icon="plus">Crear</flux:menu.item>
                                <flux:menu.item icon="arrow-path">Editar</flux:menu.item>
                                <flux:menu.item variant="danger" icon="trash">Eliminar</flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>
                    </x-general.table.row>
                </x-general.table.rows>
            @endforeach
        </x-general.table.body>
    </div>
</x-layouts.app>
