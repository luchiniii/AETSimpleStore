<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Products class
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'price'
    ];

    /**
     * Get the user that sells the Product
     *
     * @return BelongsTo
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the category that owns the Product
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    /**
     * Get rating that for the given product
     *
     * @return HasMany
     */
    public function rating(): HasMany
    {
        return $this->hasMany(ProductRating::class, 'product_id', 'id');
    }

    /**
     * Scope to retrive products by vendor name
     *
     * @param Builder $query
     * @param string $name
     * @return void
     */
    public function scopeByVendorName(Builder $query, string $name): void
    {
        $query->whereHas('vendor', function (Builder $queryRelation) use ($name): void  {
            $queryRelation->where('name', 'like', "%$name%");
        });
    }

    /**
     * Scope to retrive rating average from given product
     *
     * @param Builder $query
     * @return void
     */
    public function scopeRatingAvg(Builder $query): void
    {
        $query->withAvg('rating', 'rating');
    }
}
