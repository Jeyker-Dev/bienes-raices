@props(['titleClass' => ''])

<h3 class="text-start text-lg md:text-xl lg:text-2xl {{ $titleClass }}">
    {{ $slot }}
</h3>
