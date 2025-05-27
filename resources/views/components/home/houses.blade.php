@php
    if (!$all) {
            $houses = \App\Models\House::take(3)->get();
    } else {
         $houses = \App\Models\House::all();
    }

    $icon_text_class = '';
    $icon_class = '';
@endphp

<div>
    <x-general.subtitle subtitleClass="p-2">
        Casas y Departamentos en Venta
    </x-general.subtitle>

    <div
        class="w-11/12 md:w-10/12 2xl:w-8/12 mx-auto justify-center place-items-center grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($houses as $house)
            <x-general.card cardClass="">
                <x-general.card.image containerClass="" imageSrc="storage/{{ $house->image }}" imageClass=""/>

                <x-general.card.body>
                    <x-general.card.title titleClass="">
                        {{ $house->title }}
                    </x-general.card.title>

                    <x-general.card.text textClass="">
                        {{ $house->description }}
                    </x-general.card.text>

                    <x-general.card.important-text textClass="text-green-600">
                        $ {{ $house->price }}
                    </x-general.card.important-text>

                    @php
                        $house_features = [
                            ['icon' => 'img/icono_wc.svg', 'value' => $house->bath],
                            ['icon' => 'img/icono_estacionamiento.svg', 'value' => $house->garage],
                            ['icon' => 'img/icono_dormitorio.svg', 'value' => $house->bedroom],
                        ];
                    @endphp

                    <div class="flex justify-between">
                        @foreach($house_features as $feature)
                            <x-general.card.icon
                                containerClass=""
                                iconSrc="{{ $feature['icon'] }}"
                                iconText="{{ $feature['value'] }}"
                                iconClass="{{ $icon_class }}"
                                iconTextClass="{{ $icon_text_class }}"
                            />
                        @endforeach
                    </div>

                    <x-general.button href="{{ route('announcement', $house) }}"
                                      buttonClass="!bg-amber-600 hover:!bg-amber-500 block text-center">
                        Ver Propiedad
                    </x-general.button>
                </x-general.card.body>
            </x-general.card>
        @endforeach
    </div>

    @if(!$all)
        <div class="w-11/12 md:w-10/12 2xl:w-8/12 mx-auto my-4 flex justify-end">
            <x-general.button href="{{ route('announcements') }}" buttonClass="bg-green-600 hover:bg-green-500">
                Ver todas
            </x-general.button>
        </div>
    @endif
</div>
