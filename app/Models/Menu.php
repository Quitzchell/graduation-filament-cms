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

    public function items(): HasMany
    {
        return $this->hasMany(MenuManager::class)
            ->whereNull('parent_id')
            ->orderBy('sort');
    }
}
