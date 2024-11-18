<?php

namespace App\Models;

use App\Models\Interface\UrlableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Page extends Model implements UrlableContract
{
    protected $table = 'pages';

    protected $fillable = [
        'name',
        'parent_id',
        'menu_id',
        'uri',
        'template',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    /* Relations */
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class);
    }

    public function content(string $name): string|array|null
    {
        if (array_key_exists($name, $this->content)) {
            return $this->content[$name];
        }

        return null;
    }

    /* Urlable */
    public function uri($lang = null): string
    {
        return strtolower($this->name);
    }

    public function url($lang = null): string
    {
        return config('app.url').'Page.php/'.$this->uri($lang);
    }
}
