<?php

namespace App\Cms;

use App\Cms\Templates\Enums\Templates;
use App\Cms\Templates\Interfaces\HasFormSchema;

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

        $templateClas = new $template;

        return $templateClas instanceof HasFormSchema ? $templateClas->getForm() : [];
    }

    protected static function extractFieldNames(array $components): array
    {
        $fields = [];

        foreach ($components as $component) {
            if (method_exists($component, 'getName')) {
                $fields[] = $component->getName();
            }

            if (method_exists($component, 'getSchema')) {
                $fields = array_merge($fields, self::extractFieldNames($component->getSchema()));
            }
        }

        return $fields;
    }
}
