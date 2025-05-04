@php
    $blogs =
    [
        [
            'image' => ''
        ],
    ];
@endphp

<div class="grid lg:grid-cols-3 w-11/12 xl:w-8/12 2xl:w-6/12 p-2 mx-auto">
    <div class="lg:col-span-2">
        <h2 class="text-xl p-4 text-center">Nuestro Blog</h2>

        <x-home.our-blog.house-blog.body bodyClass="">
            <x-home.our-blog.house-blog.image imageClass="" />

            <x-home.our-blog.house-blog.content contentClass="">
                <x-home.our-blog.house-blog.title titleClass="">
                    Terraza en el techo de tu Casa
                </x-home.our-blog.house-blog.title>

                <x-home.our-blog.house-blog.text textClass="">
                    Escrito: <span class="text-yellow-500">20/10/2021</span> por: <span class="text-yellow-500">Admin</span>
                </x-home.our-blog.house-blog.text>

                <x-home.our-blog.house-blog.text textClass="">
                    Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                </x-home.our-blog.house-blog.text>

            </x-home.our-blog.house-blog.content>
        </x-home.our-blog.house-blog.body>
    </div>

    <div class="flex flex-col items-center">
        <h2 class="text-xl p-4 text-center">Testimoniales</h2>

        <x-home.our-blog.testimonials
            containerClass=""
            text="El personal se comporto de una manera excelente, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas"
        />
    </div>
</div>
