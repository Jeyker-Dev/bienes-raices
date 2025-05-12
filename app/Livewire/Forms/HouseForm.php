<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\House;

class HouseForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
    #[Validate('required|digits:2')]
    public ?int $price = null;
    #[Validate('required|image')]
    public $image;
    #[Validate('required|string')]
    public string $description = '';
    #[Validate('required|int')]
    public ?int $bedroom = null;
    #[Validate('required|int')]
    public ?int $bath = null;
    #[Validate('required')]
    public ?int $seller = null;

    public function store(): void
    {
        $this->validate();

        House::create($this->all());
    }
}
