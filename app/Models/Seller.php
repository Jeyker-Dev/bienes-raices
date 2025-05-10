<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'phone',
    ];

    public function houses(): HasMany
    {
        return $this->hasMany(House::class);
    }
}
