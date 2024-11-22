<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    /* Relations */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
