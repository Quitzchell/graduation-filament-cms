<?php

namespace App\Cms\Templates\Enums;

use App\Cms\Templates\BlogTemplate;
use App\Cms\Templates\HomeTemplate;
use App\Cms\Templates\Interfaces\HasTemplateSchema;
use App\Cms\Templates\ReviewTemplate;

enum Templates: string
{
    case HOMEPAGE = HomeTemplate::class;
    case BLOG = BlogTemplate::class;
    case REVIEW = ReviewTemplate::class;

    public static function getFormattedNames(): array
    {
        $cases = self::cases();
        $formattedNames = [];

        foreach ($cases as $case) {
            $templateClass = new $case->value;
            if ($templateClass instanceof HasTemplateSchema) {
                $formattedNames[$templateClass::class] = $templateClass->getName();
            }
        }

        return $formattedNames;
    }
}
