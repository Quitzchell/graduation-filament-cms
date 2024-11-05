<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Urlable extends Model
{
    protected $table = 'urlables';

    protected $fillable = [
        'uri',
        'linkable_type',
        'linkable_id',
    ];

    /* Relations */

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }
}
