@props(['cardClass' => ''])

<div class="bg-gray-200 max-w-92 {{ $cardClass }}">
    {{ $slot }}
</div>
