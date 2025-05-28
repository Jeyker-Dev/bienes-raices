<?php

namespace App\Livewire\Forms;

use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Contact extends Form
{
    #[Validate('required|string')]
    public string $name = '';
    #[Validate('required|string')]
    public string $lastname = '';
    #[Validate('required|email')]
    public string $email = '';
    public string $phone = '';
    #[Validate('required|string')]
    public string $message = '';
    public function send()
    {
        $this->validate();

        Mail::to('mendozajeyker1178@gmail.com')->send(new ContactForm($this->all()));

        $this->reset();
    }
}
