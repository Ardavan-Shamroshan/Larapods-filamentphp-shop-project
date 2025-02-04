<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'latitude',
        'longitude',
        'status',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
