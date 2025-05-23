@php
    $linkClass = '';
    $links = [
            [
              'href' => 'about-us',
              'text' => 'Nosotros',
            ],
            [
              'href' => 'announcements',
              'text' => 'Anuncios',
            ],
            [
              'href' => 'blog',
              'text' => 'Blog',
            ],
            [
              'href' => 'contact',
              'text' => 'Contacto',
            ],
    ];
@endphp

<div x-data="{ open: false }" class="flex flex-col justify-center items-center gap-2">
    <button x-on:click="open = !open" class="md:hidden">
        <img src="{{ asset('img/barras.svg') }}" alt="Icono menu responsive" class="w-10 h-10 cursor-pointer">
    </button>

    <!-- Menu Desktop -->
    <div class="">
        <nav class="hidden md:flex md:justify-between md:items-center md:gap-4 lg:gap-8 xl:gap-14">
            @foreach($links as $link)
                <x-general.link href="{{ $link['href'] }}" linkClass="{{ $linkClass }}">
                    {{ $link['text'] }}
                </x-general.link>
            @endforeach
        </nav>
    </div>

    <!-- Menu Mobile -->
    <div x-show="open" class="md:hidden overflow-hidden"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90">
        <nav class="flex flex-col gap-y-4">
            @foreach($links as $link)
                <x-general.link href="{{ $link['href'] }}" linkClass="{{ $linkClass }}">
                    {{ $link['text'] }}
                </x-general.link>
            @endforeach
        </nav>
    </div>
</div>
