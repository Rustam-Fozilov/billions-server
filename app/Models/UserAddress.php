<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_name',
        'latitude',
        'longitude',
        'region',
        'street',
        'district',
        'house',
        'additional_info'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
