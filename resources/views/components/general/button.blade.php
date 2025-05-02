@props(['href' => '', 'buttonClass' => ''])

<button href="{{ $href }}" class="text-white px-6 py-2 font-bold bg-black hover:bg-black/90 cursor-pointer {{ $buttonClass }}">
    {{ $slot }}
</button>
