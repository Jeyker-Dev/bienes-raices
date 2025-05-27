<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
