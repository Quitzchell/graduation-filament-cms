<?php

namespace App\Cms;

use App\Cms\Templates\Enums\Templates;
use App\Cms\Templates\Interfaces\HasTemplateSchema;

class TemplateFactory
{
    public static function getTemplateNames(): array
    {
        return Templates::getFormattedNames();
    }

    public static function getTemplateFields(string $template): array
    {
        return self::extractFieldNames(self::loadTemplateSchema($template));
    }

    public static function loadTemplateSchema(string $template): array
    {
        if (! class_exists($template)) {
            abort(404);
        }

        $templateClass = new $template;

        return $templateClass instanceof HasTemplateSchema
            ? $templateClass->getForm()
            : [];
    }

    protected static function extractFieldNames(array $components): array
    {
        $fields = [];

        foreach ($components as $component) {
            if (method_exists($component, 'getName')) {
                $fields[] = $component->getName();
            }
        }

        return $fields;
    }
}
