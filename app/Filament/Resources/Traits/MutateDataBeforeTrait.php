<?php

namespace App\Filament\Resources\Traits;

use App\Cms\TemplateFactory;

trait MutateDataBeforeTrait
{
    public function mutateData(array $data): array
    {
        $templateData = [];

        if (isset($data['template'])) {
            $templateFields = TemplateFactory::getTemplateFields($data['template']);

            foreach ($templateFields as $field) {
                $templateData[$field] = $data[$field];
                unset($data[$field]);
            }
        }

        $data['content'] = $templateData;

        return $data;
    }
}
