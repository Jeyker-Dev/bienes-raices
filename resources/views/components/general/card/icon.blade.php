@props(['containerClass' => '', 'iconSrc' => '', 'iconText' => '', 'iconClass' => '', 'iconTextClass' => ''])

<div class="flex items-center gap-2 my-4 {{ $containerClass }}">
    <img src="{{ asset($iconSrc) }}" alt="" class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 {{ $iconClass }}">
    <p class="text-sm sm:text-base lg:text-lg {{ $iconTextClass }}">
        {{ $iconText }}
    </p>
</div>
