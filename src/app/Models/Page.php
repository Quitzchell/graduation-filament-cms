<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'name',
        'template',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

}
