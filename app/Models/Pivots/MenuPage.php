<?php

namespace App\Models\Pivots;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuPage extends Pivot
{
    protected $table = 'menu_page';

    public $timestamps = false;

    protected $casts = [
        'children' => 'array',
    ];

    /* Relations */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
