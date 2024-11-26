<?php

namespace App\Models;

use App\Models\Interfaces\HasContent;
use App\Models\Traits\ProvidesContentTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model implements HasContent
{
    use ProvidesContentTrait;

    protected $table = 'reviews';

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'date',
    ];

    protected $fillable = [
        'reviewable_type',
        'reviewable_id',
        'title',
        'slug',
        'excerpt',
        'image',
        'score',
        'published_at',
    ];

    /* Relations */
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
