<?php

namespace App\Cms;

use App\Cms\Templates\Interfaces\HasTemplateSchema;

readonly class TemplateFactory
{
    public function __construct(private array $templates) {}

    public function getTemplateFields(string $template): array
    {
        return $this->extractFieldNames($this->loadTemplateSchema($template));
    }

    protected function extractFieldNames(array $components): array
    {
        $fields = [];

        foreach ($components as $component) {
            if (method_exists($component, 'getName')) {
                $fields[] = $component->getName();
            }
        }

        return $fields;
    }

    public function getTemplateNames(): array
    {
        $formattedNames = [];

        foreach ($this->templates as $className => $templateClass) {
            if ($templateClass instanceof HasTemplateSchema) {
                $formattedNames[$className] = $templateClass->getName();
            }
        }

        return $formattedNames;
    }

    public function loadTemplateSchema(string $template): array
    {
        if (! class_exists($template)) {
            abort(404);
        }

        $templateClass = new $template;

        return $templateClass instanceof HasTemplateSchema
            ? $templateClass->getForm()
            : [];
    }
}
