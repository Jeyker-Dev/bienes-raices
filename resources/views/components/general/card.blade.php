@props(['cardClass' => ''])

<div class="bg-gray-300 max-w-92 {{ $cardClass }}">
    {{ $slot }}
</div>
