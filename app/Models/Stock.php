<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'attributes', 'quantity'];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
