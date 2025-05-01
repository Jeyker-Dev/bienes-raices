@props(['subtitleClass'])

<h2 class="text-black text-center my-4 text-xl md:text-2xl {{ $subtitleClass }}">
    {{ $slot }}
</h2>
