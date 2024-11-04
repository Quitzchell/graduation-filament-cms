<?php

namespace App\Filament\Resources\Traits;

use App\Cms\TemplateFactory;

trait MutateTemplateData
{
    public function mutateTemplateData(array $data): array
    {
        $templateData = [];

        if (isset($data['template'])) {
            $templateFields = TemplateFactory::getTemplateFields($data['template']);

            foreach ($templateFields as $field) {
                $templateData[$field] = $data[$field];
                unset($data[$field]);
            }
        }

        $data['data'] = $templateData;

        return $data;
    }
}
