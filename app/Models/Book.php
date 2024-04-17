<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Book extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'author_id',
        'description',
        'short_description'
    ];

    protected $casts = [
        'name' => 'json',
        'short_description' => 'json',
        'description' => 'json',
    ];

    public array $translatable = [];

    public function getName(): string
    {
        return $this->getTranslations('name')['uz'];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function withStock($stockId): static
    {
        $this->stocks = [$this->stocks()->findOrFail($stockId)];
        return $this;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function currency_prices(): HasMany
    {
        return $this->hasMany(CurrencyPrice::class, 'book_id', 'id');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
