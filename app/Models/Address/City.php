<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    protected $fillable = [
        'province_id',
        'name',
        'name_en',
        'latitude',
        'longitude',
        'status',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
