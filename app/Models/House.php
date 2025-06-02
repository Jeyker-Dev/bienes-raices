<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class House extends Model
{
    protected $fillable = [
        'title',
        'price',
        'image',
        'description',
        'bedroom',
        'bath',
        'garage',
        'seller_id',
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => Storage::url($this->image),
        );
    }
}
