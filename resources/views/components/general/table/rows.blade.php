@props(['rowsClass' => ''])

<tr class="border-b border-b-gray-200 {{ $rowsClass }}">
    {{ $slot }}
</tr>
