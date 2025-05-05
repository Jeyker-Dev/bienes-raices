@props(['textClass' => ''])

<p class="text-sm md:text-base mb-4 text-start {{ $textClass }}">
    {!! $slot !!}
</p>
