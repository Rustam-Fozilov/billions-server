<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'author_name',
        'book_description',
        'book_image',
        'book_price',
        'page_count',
        'category_id',
        'cover_type',
        'book_language',
        'book_year',
        'keywords',
    ];
}
