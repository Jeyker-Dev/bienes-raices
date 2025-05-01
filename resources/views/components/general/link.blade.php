@props(['href' => '', 'linkClass' => ''])

<a href="{{ $href }}" class="text-white text-lg sm:text-xl font-bold hover:text-green-500 {{ $linkClass }}">
    {{ $slot }}
</a>
