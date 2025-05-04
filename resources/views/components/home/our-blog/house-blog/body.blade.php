@props(['bodyClass' => ''])

<div class="flex {{ $bodyClass }}">
    {{ $slot }}
</div>
