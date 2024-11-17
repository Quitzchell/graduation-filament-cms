<?php

namespace App\Models;

use App\Models\Interface\UrlableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Page::class, 'parent_id');
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
