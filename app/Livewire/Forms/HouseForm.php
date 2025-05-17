<?php

namespace App\Livewire\Forms;

use Flux\Flux;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\House;

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
    protected Filesystem $disk;

    public function boot(): void
    {
        $this->disk = Storage::disk('local');
    }

    public function delete(?int $id): void
    {
        $house = House::findOrFail($id);

        $house->delete();

        $this->disk->delete($house->image);

        Flux::modals()->close();
    }

    public function store(): void
    {
        $this->validate();

        $this->image_path = $this->disk->put('houses', $this->image);

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
