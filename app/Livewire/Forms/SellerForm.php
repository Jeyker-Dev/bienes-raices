<?php

namespace App\Livewire\Forms;

use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Seller;

class SellerForm extends Form
{
    #[Validate('required|string')]
    public string $name = '';
    #[Validate('required|string')]
    public string $lastname = '';
    #[Validate('required|string')]
    public string $phone = '';

    public function store():void
    {
        $this->validate();

        Seller::create($this->all());

        Flux::modals()->close();

        $this->reset();
    }
}
