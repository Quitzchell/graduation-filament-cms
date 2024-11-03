<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
        'name',
        'template_id'
    ];

    /* Relations */
    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }
}
