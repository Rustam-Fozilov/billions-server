<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookPriceInCurrency extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'name',
        'price',
        'symbol',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
