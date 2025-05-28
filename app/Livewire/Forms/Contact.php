<?php

namespace App\Livewire\Forms;

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

        dd($this->all());

        Mail::to('mendozajeyker1178@gmail.com')->send($this->all());

        $this->reset();
    }
}
