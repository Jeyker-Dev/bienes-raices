@props(['tableClass' => ''])

<table class="border border-gray-300 shadow {{ $tableClass }}">
    {{ $slot }}
</table>
