<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'published_year',
        'description',
    ];

    /* Relations */
    public function review(): MorphOne
    {
        return $this->morphOne(Review::class, 'reviewable');
    }
}
