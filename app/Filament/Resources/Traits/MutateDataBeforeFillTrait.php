<?php

namespace App\Filament\Resources\Traits;

trait MutateDataBeforeFillTrait
{
    public function beforeFillMutation(array $data): array
    {
        if ($this->record->contents) {
            foreach ($this->record->contents as $templateData) {
                $data[$templateData->name] = $templateData->value;
            }
        }

        return $data;
    }
}
