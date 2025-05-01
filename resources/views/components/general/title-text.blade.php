@props(['title' => '', 'text' => '', 'titleClass' => '', 'textClass' => ''])

<div class="flex flex-col gap-y-4 my-4">
    <h3 class="text-lg lg:text-xl text-center {{ $titleClass }}">
        {{ $title }}
    </h3>

    <p class="text-sm lg:text-base text-center {{ $textClass }}">
        {{ $text }}
    </p>
</div>
