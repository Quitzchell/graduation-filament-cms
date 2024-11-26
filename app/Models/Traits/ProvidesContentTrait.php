<?php

namespace App\Models\Traits;

use App\Models\Content;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait ProvidesContentTrait
{
    public function contents(): MorphMany
    {
        return $this->morphMany(Content::class, 'contentable');
    }

    public function content(string $name): string|array|null
    {
        return $this->contents()->where('name', $name)->first()?->value;
    }
}
