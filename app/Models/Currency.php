<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Currency extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'symbol',
    ];

    public array $translatable = ['name'];

    public function currency_prices(): HasMany
    {
        return $this->hasMany(CurrencyPrice::class);
    }
}
