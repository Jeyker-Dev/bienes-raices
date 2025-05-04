@props(['titleClass' => ''])

<h3 class="text-center text-lg md:text-xl lg:text-2xl {{ $titleClass }}">
    {{ $slot }}
</h3>
