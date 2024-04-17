<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'priority',
        'path_name',
    ];

    public array $translatable = [];

    protected $casts = [
        'name' => 'json'
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function child_categories(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent_category(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
}
