<?php

namespace App\Cms\Templates\Enums;

use App\Cms\Templates\Blog\Blog;
use App\Cms\Templates\Homepage\Homepage;

enum Templates: string
{
    case HOMEPAGE = Homepage::class;
    case BLOG = Blog::class;
    case REVIEW = 'App\Cms\Templates\Review';

    public static function getFormattedNames(): array
    {
        $cases = self::cases();
        $formattedNames = [];

        foreach ($cases as $case) {
            $formattedNames[$case->value] = ucfirst(strtolower($case->name));
        }

        return $formattedNames;
    }
}
