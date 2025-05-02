@php
    $cards =
    [
        [
            'title' => 'Cabaña',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        A accusantium consectetur, error explicabo molestiae natus officia quae quidem quos vel?
                        Consequuntur corporis ea ex, neque officia quis sapiente vel voluptates?',
            'href' => '#',
            'button_text' => 'Ver propiedad',
            'imageSrc' => 'img/anuncio1.jpg',
        ],
        [
            'title' => 'Cabaña',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        A accusantium consectetur, error explicabo molestiae natus officia quae quidem quos vel?
                        Consequuntur corporis ea ex, neque officia quis sapiente vel voluptates?',
            'href' => '#',
            'button_text' => 'Ver propiedad',
            'imageSrc' => 'img/anuncio1.jpg',
        ],
         [
            'title' => 'Cabaña',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        A accusantium consectetur, error explicabo molestiae natus officia quae quidem quos vel?
                        Consequuntur corporis ea ex, neque officia quis sapiente vel voluptates?',
            'href' => '#',
            'button_text' => 'Ver propiedad',
            'imageSrc' => 'img/anuncio1.jpg',
        ],
    ];

    $icon_text_class = '';
    $icon_class = '';

    $icons =
    [
        'img/icono_wc.svg',
        'img/icono_estacionamiento.svg',
        'img/icono_dormitorio.svg',
    ];
@endphp

<div>
    <x-general.subtitle subtitleClass="p-2">
        Casas y Departamentos en Venta
    </x-general.subtitle>

    <div class="w-11/12 mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($cards as $card)
            <x-general.card cardClass="">
                <x-general.card.image containerClass="" imageSrc="{{ $card['imageSrc'] }}" imageClass=""/>

                <x-general.card.body>
                    <x-general.card.title titleClass="">
                        {{ $card['title'] }}
                    </x-general.card.title>

                    <x-general.card.text textClass="">
                        {{ $card['text'] }}
                    </x-general.card.text>

                    <div class="flex justify-between">
                        @foreach($icons as $icon)
                            <x-general.card.icon containerClass="" iconSrc="{{ $icon }}" iconText="1"
                                                 iconClass="{{ $icon_class }}" iconTextClass="{{ $icon_text_class }}"/>
                        @endforeach
                    </div>

                    <x-general.button href="{{ $card['href'] }}" buttonClass="!bg-amber-600 hover:!bg-amber-500 w-full">
                        {{ $card['button_text'] }}
                    </x-general.button>
                </x-general.card.body>
            </x-general.card>
        @endforeach
    </div>
</div>
