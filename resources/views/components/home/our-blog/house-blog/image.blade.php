@props(['imageClass' => '', 'imageSrc' => ''])

<img src="{{ asset($imageSrc) }}" alt="" class=" md:w-1/3 object-cover object-center {{ $imageClass }}">
