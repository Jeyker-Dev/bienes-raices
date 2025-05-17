<?php

namespace App\Livewire\Forms;

use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\House;
use Livewire\WithFileUploads;

class HouseForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
    #[Validate('required')]
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
    public string $image_path = '';

    public function store(): void
    {
        $this->validate();

        $disk = Storage::disk('local');

        $this->image_path = $disk->put('houses', $this->image);

        House::create([
            'title' => $this->title,
            'price' => $this->price,
            'image' => $this->image_path,
            'description' => $this->description,
            'bedroom' => $this->bedroom,
            'bath' => $this->bath,
            'seller_id' => $this->seller,
        ]);

        Flux::modals()->close();

        $this->reset();
    }
}
