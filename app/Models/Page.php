<?php

namespace App\Models;

use App\Models\Interfaces\HasContent;
use App\Models\Interfaces\HasUrl;
use App\Models\Traits\ProvidesContentTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Page extends Model implements HasContent, HasUrl
{
    use ProvidesContentTrait;

    protected $table = 'pages';

    protected $fillable = [
        'name',
        'parent_id',
        'menu_id',
        'uri',
        'template',
        'content',
    ];

    /* Relations */
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class);
    }

    /* HasUrl */
    public function uri($lang = null): string
    {
        return strtolower($this->name);
    }

    public function url($lang = null): string
    {
        return url($this->uri($lang));
    }
}
