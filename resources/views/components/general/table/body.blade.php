@props(['tableClass' => ''])

<div class="overflow-x-auto">
    <table class="border border-gray-300 shadow w-11/12 lg:w-9/12 mx-auto {{ $tableClass }}">
        {{ $slot }}
    </table>
</div>
