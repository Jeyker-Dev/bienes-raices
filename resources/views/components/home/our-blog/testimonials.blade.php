@props(['containerClass' => '', 'containerTextClass' => '', 'text' => '', 'textClass' => ''])

<div class="{{ $containerClass }}">
    <div class="bg-lime-500 rounded-2xl p-6 w-full flex gap-2 {{ $containerTextClass }}">
        <span class='text-8xl text-white'>&quot</span>
        <p class="text-white text-lg text-start {{ $textClass }}"> {!! $text !!} </p>
    </div>
</div>
