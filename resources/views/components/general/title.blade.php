@props(['titleClass' => ''])

<h1 class="text-lg sm:text-2xl lg:text-3xl text-white font-bold {{ $titleClass }}">
    {{ $slot }}
</h1>
