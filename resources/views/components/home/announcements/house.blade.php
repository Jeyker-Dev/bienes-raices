@php
    $icon_text_class = '';
    $icon_class = '';
@endphp

<div class="w-11/12 md:w-7/12 mx-auto">
    <x-general.card cardClass="bg-white max-w-full">
        <x-general.card.title titleClass="mt-10 mb-6 md:!text-3xl lg:!text-4xl">
            {{ $announcement->title }}
        </x-general.card.title>

        <x-general.card.image containerClass="" imageSrc="{{ $announcement->image_url }}" imageClass=""/>

        <x-general.card.body>
            <x-general.card.important-text textClass="text-green-600">
                $ {{ $announcement->price }}
            </x-general.card.important-text>

            @php
                $announcement_features = [
                    ['icon' => 'img/icono_wc.svg', 'value' => $announcement->bath],
                    ['icon' => 'img/icono_estacionamiento.svg', 'value' => $announcement->garage],
                    ['icon' => 'img/icono_dormitorio.svg', 'value' => $announcement->bedroom],
                ];
            @endphp

            <div class="flex justify-between">
                @foreach($announcement_features as $feature)
                    <x-general.card.icon
                        containerClass=""
                        iconSrc="{{ $feature['icon'] }}"
                        iconText="{{ $feature['value'] }}"
                        iconClass="{{ $icon_class }}"
                        iconTextClass="{{ $icon_text_class }}"
                    />
                @endforeach
            </div>

            <x-general.card.text textClass="">
                {{ $announcement->description }}
            </x-general.card.text>
        </x-general.card.body>
    </x-general.card>
</div>
