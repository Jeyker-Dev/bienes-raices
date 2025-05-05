@php
    $blogs =
    [
        [
            'image' => 'img/blog1.jpg',
            'title' => 'Terraza en el techo de tu Casa',
            'text1' => 'Escrito: <span class="text-yellow-500">20/10/2021</span> por: <span class="text-yellow-500">Admin</span>',
            'text2' => 'Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero',
        ],
        [
            'image' => 'img/blog2.jpg',
            'title' => 'Terraza en el techo de tu Casa',
            'text1' => 'Escrito: <span class="text-yellow-500">20/10/2021</span> por: <span class="text-yellow-500">Admin</span>',
            'text2' => 'Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero',
        ],
    ];
@endphp

<div class="grid lg:grid-cols-3 w-11/12 xl:w-8/12 2xl:w-6/12 p-2 mx-auto">
    <div class="lg:col-span-2">
        <h2 class="text-xl p-4 text-center">Nuestro Blog</h2>

       @foreach($blogs as $blog)
            <x-home.our-blog.house-blog.body bodyClass="mb-4">
                <x-home.our-blog.house-blog.image imageClass="" imageSrc="{{ $blog['image'] }}" />

                <x-home.our-blog.house-blog.content contentClass="">
                    <x-home.our-blog.house-blog.title titleClass="">
                        {{ $blog['title'] }}
                    </x-home.our-blog.house-blog.title>

                    <x-home.our-blog.house-blog.text textClass="">
                        {!! $blog['text1'] !!}
                    </x-home.our-blog.house-blog.text>

                    <x-home.our-blog.house-blog.text textClass="">
                        {{ $blog['text2'] }}
                    </x-home.our-blog.house-blog.text>

                </x-home.our-blog.house-blog.content>
            </x-home.our-blog.house-blog.body>
       @endforeach
    </div>

    <div class="flex flex-col items-center">
        <h2 class="text-xl p-4 text-center">Testimoniales</h2>

        <x-home.our-blog.testimonials
            containerClass=""
            text="El personal se comporto de una manera excelente, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas"
        />
    </div>
</div>
