<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{

    protected $table = 'templates';

    protected $fillable = [
        'name'
    ];

    public function page(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
