<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Author extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['first_name', 'last_name', 'description', 'photo'];

    public array $translatable = [];

    protected $casts = [
        'first_name' => 'json',
        'last_name' => 'json',
        'description' => 'json',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function withBooks($bookId): static
    {
        $this->books = [$this->books()->findOrFail($bookId)];
        return $this;
    }
}
