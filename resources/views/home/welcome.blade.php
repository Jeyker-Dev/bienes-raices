@php
    $all = null;
@endphp

<x-layouts.public>
    <x-home.header-large />

    <x-home.more-about-us />

    <x-home.houses :all="$all" />

    <x-home.find-us />

    <x-home.our-blog />

    <x-home.footer />
</x-layouts.public>





