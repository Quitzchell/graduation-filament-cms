<?php

namespace App\Models;

use App\Models\Pivots\ActorMovie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actor extends Model
{
    protected $table = 'actors';

    protected $appends = ['full_name'];

    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'date_of_birth',
    ];

    /* Relations */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }

    public function actorMovies(): HasMany
    {
        return $this->hasMany(ActorMovie::class);
    }

    /* Accessors */
    public function getFullNameAttribute(): string
    {
        return implode(' ', array_filter([$this->name, $this->middle_name, $this->surname]));
    }
}
