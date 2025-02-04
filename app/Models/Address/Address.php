<?php

namespace App\Models\Address;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'address',
        'postal_code',
        'no',
        'unit',
        'other_recipient',
        'recipient_first_name',
        'recipient_last_name',
        'mobile',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
