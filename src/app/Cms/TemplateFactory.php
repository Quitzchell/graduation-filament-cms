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

    public static function getTemplateFields(string $template): array
    {
        $formSchema = self::loadTemplateSchema($template);
        return self::extractFieldNames($formSchema);
    }

    public static function loadTemplateSchema(string $template): array
    {
        if (class_exists($template)) {
            return (new $template())->getForm();
        }

        return [];
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
