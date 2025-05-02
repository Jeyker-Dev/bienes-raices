@props(['containerClass' => '', 'imageSrc' => '', 'imageClass' => ''])

<div class="w-full {{ $containerClass }}">
    <img src="{{ asset($imageSrc) }}" alt="" class="w-full object-cover object-center {{ $imageClass }}">
</div>
