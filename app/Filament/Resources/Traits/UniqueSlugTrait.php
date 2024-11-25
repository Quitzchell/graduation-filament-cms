<?php

namespace App\Filament\Resources\Traits;

use Closure;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;

trait UniqueSlugTrait
{
    public static function createSlug(string $slugFieldName): Closure
    {
        return function (Get $get, Set $set, $record, $model, ?string $old, ?string $state) use ($slugFieldName) {
            if (($get($slugFieldName) ?? '') !== Str::slug($old)) {
                return;
            }

            // prepare slug
            $baseSlug = Str::slug($state);
            $slug = $baseSlug;

            // Check and ensure slug uniqueness
            $counter = 1;
            while ($model::query()->where($slugFieldName, $slug)->where('id', '<>', $record?->id)->exists()) {
                $slug = "{$baseSlug}-{$counter}";
                $counter++;
            }

            $set($slugFieldName, $slug);
        };
    }
}
