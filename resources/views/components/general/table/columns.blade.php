@props(['rowsClass' => ''])

<tr class="bg-gray-100 {{ $rowsClass }}">
    {{ $slot }}
</tr>
