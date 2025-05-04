@props(['textClass' => ''])

<p class="text-sm md:text-base leading-6 mb-4 {{ $textClass }}">
    {{ $slot }}
</p>
