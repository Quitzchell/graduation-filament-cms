<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Director extends Model
{
    protected $table = 'directors';

    protected $appends = ['full_name'];

    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'date_of_birth',
    ];

    /* Relations */
    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }

    /* Accessors */
    public function getFullNameAttribute(): string
    {
        return implode(' ', array_filter([$this->name, $this->middle_name, $this->surname]));
    }
}
