<?php

namespace App\Livewire\Forms;

use Flux\Flux;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;
use App\Models\House;

class HouseForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
    #[Validate('required')]
    public ?int $price = null;
    #[Validate('required|image')]
    public ?TemporaryUploadedFile $image = null;
    #[Validate('required|string')]
    public string $description = '';
    #[Validate('required|int')]
    public ?int $bedroom = null;
    #[Validate('required|int')]
    public ?int $bath = null;
    #[Validate('required|int')]
    public ?int $garage = null;
    #[Validate('required')]
    public ?int $seller = null;
    public string $image_path = '';
    protected ?House $house = null;
    protected string $disk;
    protected Filesystem $storage;
    public ?int $house_id = null;

    public function boot(): void
    {
        $this->disk = config('filesystems.default');
        $this->storage = Storage::disk($this->disk);
    }

    public function setHouse(?int $id): void
    {
        $house = House::findOrFail($id);
        $this->house_id = $id;

        $this->house = $house;
        $this->title = $this->house->title;
        $this->price = $this->house->price;
        $this->image_path = $this->house->image_url;
        $this->description = $this->house->description;
        $this->bedroom = $this->house->bedroom;
        $this->bath = $this->house->bath;
        $this->garage = $this->house->garage;
        $this->seller = $this->house->seller_id;
    }

    public function delete(?int $id): void
    {
        $house = House::findOrFail($id);

        $house->delete();

        $this->disk->delete($house->image);

        Flux::modals()->close();
    }

    public function update()
    {
        $house = House::findOrFail($this->house_id);
        $this->house = $house;

        $rules = [
            'title' => 'required|string',
            'price' => 'required',
            'description' => 'required|string',
            'bedroom' => 'required|int',
            'bath' => 'required|int',
            'garage' => 'required|int',
            'seller' => 'required',
        ];

        if ($this->image) $rules['image'] = 'image';

        $this->validate($rules);

        if ($this->image) {
            $this->storage->delete($this->house->image);
            $this->image_path = $this->storage->put('houses', $this->image);
        } else {
            $this->image_path = $this->house->image;
        }

        $this->house->update([
            'title' => $this->title,
            'price' => $this->price,
            'image' => $this->image_path,
            'description' => $this->description,
            'bedroom' => $this->bedroom,
            'bath' => $this->bath,
            'garage' => $this->garage,
            'seller_id' => $this->seller,
        ]);

        Flux::modals()->close();
    }

    public function store(): void
    {
        $this->validate();

        $this->image_path = $this->storage->put('houses', $this->image);

        House::create([
            'title' => $this->title,
            'price' => $this->price,
            'image' => $this->image_path,
            'description' => $this->description,
            'bedroom' => $this->bedroom,
            'bath' => $this->bath,
            'garage' => $this->garage,
            'seller_id' => $this->seller,
        ]);

        Flux::modals()->close();
    }
}
