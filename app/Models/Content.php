<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [
        'contentable_type',
        'contentable_id',
        'name',
        'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public function contentable(): MorphTo
    {
        return $this->morphTo();
    }
}
