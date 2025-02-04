<?php

namespace App\Models;

use App\Models\Shop\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'image',
        'status',
        'deleted_at',
    ];

    public function scopeSubcategories(Builder $query): void
    {
        $query->whereNotNull('parent_id');
    }

    public function scopeParents(Builder $query): void
    {
        $query->whereNull('parent_id');
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('subcategories');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
