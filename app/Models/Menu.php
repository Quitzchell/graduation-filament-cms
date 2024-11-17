<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name',
    ];

    /* Relations */

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}