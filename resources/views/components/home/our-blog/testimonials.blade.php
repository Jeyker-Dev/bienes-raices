@props(['containerClass' => '', 'containerTextClass' => '', 'text' => '', 'textClass' => ''])

<div class="w-8/12 md:w-5/12 lg:w-8/12 xl:w-10/12 2xl:w-10/12 {{ $containerClass }}">
    <div class="bg-lime-500 rounded-2xl p-6 w-full flex gap-2 {{ $containerTextClass }}">
        <span class='text-8xl text-white'>&quot</span>
        <p class="text-white text-lg text-start {{ $textClass }}"> {!! $text !!} </p>
    </div>
</div>
