<div class="relative bg-white">
    <div class="lg:absolute lg:inset-0 lg:left-1/2">
        <img class="h-64 w-full bg-gray-50 object-cover sm:h-80 lg:absolute lg:h-full"
             src="{{ asset('img/destacada.jpg') }}" alt="">
    </div>
    <div class="pt-16 pb-24 sm:pt-24 sm:pb-32 lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:pt-32">
        <div class="px-6 lg:px-8">
            <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">Contactanos</h2>
                <p class="mt-2 text-lg/8 text-gray-600">Llena el siguiente formulario y envianos un mensaje con tus
                    datos.</p>
                <form wire:submit.prevent="save" class="mt-16">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">Nombre</label>
                            <div class="mt-2.5">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                       class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Apellido</label>
                            <div class="mt-2.5">
                                <input type="text" name="last-name" id="last-name" autocomplete="name"
                                       class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                            <div class="mt-2.5">
                                <input id="email" name="email" type="email" autocomplete="email"
                                       class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <div class="flex justify-between text-sm/6">
                                <label for="phone" class="block font-semibold text-gray-900">Telefono</label>
                                <p id="phone-description" class="text-gray-400">Optional</p>
                            </div>
                            <div class="mt-2.5">
                                <input type="tel" name="phone" id="phone" autocomplete="tel"
                                       aria-describedby="phone-description"
                                       class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <div class="flex justify-between text-sm/6">
                                <label for="message" class="block text-sm/6 font-semibold text-gray-900">En que podemos
                                    ayudarte?</label>
                            </div>
                            <div class="mt-2.5">
                                <textarea id="message" name="message" rows="4" aria-describedby="message-description"
                                          class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 flex justify-end border-t border-gray-900/10 pt-8">
                        <button type="submit"
                                class="rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
