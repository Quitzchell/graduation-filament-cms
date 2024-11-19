<?php

namespace App\Filament\Resources\Traits;

use App\Cms\TemplateFactory;

trait MutateDataBeforeCreateOrUpdateTrait
{
    public function beforeCreateOrUpdateMutation(array $data): array
    {
        $templateData = [];

        if (isset($data['template'])) {
            $templateFields = TemplateFactory::getTemplateFields($data['template']);

            foreach ($templateFields as $field) {
                $templateData[$field] = $data[$field];
                unset($data[$field]);
            }
        }

        foreach ($templateData as $name => $value) {
            $this->record->contents()->updateOrCreate(
                ['name' => $name],
                ['value' => $value,]
            );
        }

        return $data;
    }
}
