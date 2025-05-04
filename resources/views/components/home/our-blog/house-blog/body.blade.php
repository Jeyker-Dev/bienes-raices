@props(['bodyClass' => ''])

<div class="flex flex-col md:flex-row gap-6 {{ $bodyClass }}">
    {{ $slot }}
</div>
