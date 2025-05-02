@props(['bodyClass' => ''])

<div class="p-4 {{ $bodyClass }}">
    {{ $slot }}
</div>
