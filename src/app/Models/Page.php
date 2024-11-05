<?php

namespace App\Models;

use App\Models\Interface\UrlableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Page extends Model implements UrlableContract
{
    protected $table = 'pages';

    protected $fillable = [
        'name',
        'template',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    /* Relations */

    public function urlable(): MorphMany
    {
        return $this->morphMany(Urlable::class, 'linkable');
    }

    /* Urlable */
    public function uri($lang = null)
    {
        return strtolower($this->name);
    }

    public function url($lang = null)
    {
        return config('app.url').'/'.$this->uri($lang);
    }
}
