<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'code',
        'price',
        'discount',
        'image',
        'marketable',
        'in_stock',
        'sales_status',
    ];

    public function scopeOutOfStock(Builder $builder)
    {
        return $builder
            ->where('in_stock', 0)
            ->orWhere('marketable', 0);
    }

    public function scopeInStockQuery(Builder $builder)
    {
        return $builder
            ->whereNot('in_stock', 0)
            ->orWhereNot('marketable', 0);
    }

    public function outOfStock(): bool
    {
        return $this->in_stock == 0 || $this->marketable == 0;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
