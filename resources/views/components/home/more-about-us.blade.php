@php
    $title_class = '';
    $text_class = 'p-3';

    $icons = [
        [
            'icon' => 'img/icono1.svg',
            'title' => 'Seguridad',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur mollitia nostrum quasi totam. Accusamus, deserunt neque.
            Alias at eius, eligendi, eos explicabo maxime minima provident quas repudiandae sit tempora!',
        ],
         [
            'icon' => 'img/icono2.svg',
            'title' => 'Precio',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur mollitia nostrum quasi totam. Accusamus, deserunt neque.
            Alias at eius, eligendi, eos explicabo maxime minima provident quas repudiandae sit tempora!',
        ],
        [
            'icon' => 'img/icono3.svg',
            'title' => 'Tiempo',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur mollitia nostrum quasi totam. Accusamus, deserunt neque.
            Alias at eius, eligendi, eos explicabo maxime minima provident quas repudiandae sit tempora!',
        ],
];

@endphp

<div class="w-11/12 mx-auto flex flex-col justify-center items-center my-4">
    <x-general.subtitle subtitleClass="">
        Más Sobre Nosotros
    </x-general.subtitle>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 my-4 mx-auto sm:w-9/12 lg:w-full xl:w-10/12 2xl:w-9/12">
        @foreach($icons as $icon)
            <div class="flex flex-col justify-center items-center p-2">
                <img src="{{ asset($icon['icon']) }}" alt=""
                     class="w-14 h-14 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 object-fit object-center"
                >

                <x-general.title-text
                    title="{{ $icon['title'] }}"
                    text="{{ $icon['text'] }}"
                    titleClass="{{ $title_class }}"
                    textClass="{{ $text_class }}"
                />
            </div>
        @endforeach
    </div>

</div>
