<?php

namespace App\Cms;

use App\Cms\Templates\Homepage;

class TemplateFactory
{
    public static function getTemplateNames(): array
    {
        return [
            Homepage::class => class_basename(Homepage::class),
        ];
    }

    public static function loadTemplateSchema(string $templateClass): array
    {
        if (class_exists($templateClass)) {
            return (new $templateClass())->getForm();
        }

        return [];
    }

}
