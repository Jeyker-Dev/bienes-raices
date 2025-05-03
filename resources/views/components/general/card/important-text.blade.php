@props(['textClass' => ''])

<p class="text-xl md:text-2xl lg:text-3xl font-bold text-black my-2 {{ $textClass }}">
    {{ $slot }}
</p>
