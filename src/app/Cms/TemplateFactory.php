<?php

namespace App\Cms;

use App\Cms\Templates\Homepage;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

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
        return self::extractFieldNames(self::loadTemplateSchema($template));
    }
    public static function loadTemplateSchema(string $template): array
    {
        return class_exists($template) ? (new $template())->getForm() : [];
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
