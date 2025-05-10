@props(['rowsClass' => ''])

<tr class="{{ $rowsClass }}">
    {{ $slot }}
</tr>
