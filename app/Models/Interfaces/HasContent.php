<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasContent
{
    public function contents(): MorphMany;

    public function content(string $name): string|array|null;
}
