@php
    $linkClass = '';
    $links = [
            [
              'href' => '#',
              'text' => 'Nosotros',
            ],
            [
              'href' => '#',
              'text' => 'Anuncios',
            ],
            [
              'href' => '#',
              'text' => 'Blog',
            ],
            [
              'href' => '#',
              'text' => 'Contacto',
            ],
    ];

    $date = date('Y');
@endphp

<div class="bg-black p-10">
                <div class="flex flex-col items-center md:flex-row md:items-start gap-4">
                    @foreach($links as $link)
                        <x-general.link href="{{ $link['href'] }}" linkClass="{{ $linkClass }}">
                            {{ $link['text'] }}
                        </x-general.link>
                    @endforeach
                </div>

            <p class="text-white text-2xl text-center p-2">Todos los derechos reservados {{ $date }} ©</p>
</div>
