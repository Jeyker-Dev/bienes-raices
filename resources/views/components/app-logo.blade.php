@props(['linkClass', 'iconClass'])

<a href="{{ route('home') }}" class="{{ $linkClass }} max-h-10">
    <img src="{{ asset('img/logo.svg') }}" alt="Logotipo de Bienes Raices" class="w-52 sm:w-62 md:w-72 {{ $iconClass }} bg-black">
</a>
