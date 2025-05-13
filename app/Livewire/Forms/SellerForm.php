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

    public ?Seller $seller;

    public function store():void
    {
        $this->validate();

        Seller::create($this->all());

        Flux::modals()->close();

        $this->reset();
    }

    public function setSeller(Seller $seller): void
    {
        $this->seller = $seller;
        $this->name = $seller->name;
        $this->lastname = $seller->lastname;
        $this->phone = $seller->phone;
    }

    public function update(): void
    {
        $this->validate();

        $this->seller->update($this->all());
    }
}
