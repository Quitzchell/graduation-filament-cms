<?php

namespace App\Models;

use App\Models\Interfaces\HasReview;
use App\Models\Pivots\ActorMovie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Movie extends Model implements HasReview
{
    protected $table = 'movies';

    protected $fillable = [
        'title',
        'slug',
        'release_year',
        'description',
        'trailer_id',
    ];

    /* Relations */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    public function actorMovies(): HasMany
    {
        return $this->hasMany(ActorMovie::class);
    }

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    public function review(): MorphOne
    {
        return $this->morphOne(Review::class, 'reviewable');
    }
}
