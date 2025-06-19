<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // data Book disimpan di table books
    protected $table = 'books';

    // kolom yang bisa di mass assign
    protected $fillable = [
        'title',
        'author',
        'published_year',
        'category',
        'isbn',
        'excerpt',
    ];
}
