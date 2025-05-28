<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\Contact;

new class extends Component {
    public Contact $form;
    public function save(): void
    {
        $this->form->send();

        $this->dispatch('toast', [
            'title' => 'Mensaje Enviado!',
            'text' => 'El mensaje se ha enviado correctamente.',
            'icon' => 'success',
        ]);
    }
}; ?>

<div class="w-11/12 md:w-9/12 xl:w-8/12 mx-auto my-10">
    <x-general.title titleClass="!text-center !text-black my-10 lg:!text-4xl">
        Contacto
    </x-general.title>

    <x-home.contact.form />

    <x-general.toast.body />
</div>
