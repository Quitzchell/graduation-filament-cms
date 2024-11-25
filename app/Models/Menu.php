<?php

namespace App\Models;

use App\Models\Pivots\MenuPage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name',
    ];

    /* Relations */

    public function pages(): BelongsToMany
    {
        return $this->belongsToMany(Page::class);
    }

    public function MenuPages(): HasMany
    {
        return $this->hasMany(MenuPage::class);
    }
}
