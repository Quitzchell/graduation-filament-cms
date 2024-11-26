<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Interfaces\HasContent;
use App\Models\Traits\ProvidesContentTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model implements HasContent
{
    use ProvidesContentTrait;

    protected $table = 'blog_posts';

    protected $casts = [
        'published' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'image',
        'category_id',
        'published_at',
        'published',
    ];

    /* Relations */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
