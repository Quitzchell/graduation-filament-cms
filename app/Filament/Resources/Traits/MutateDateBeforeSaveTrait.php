<?php

namespace App\Filament\Resources\Traits;

use App\Cms\TemplateFactory;
use Illuminate\Support\Arr;

trait MutateDateBeforeSaveTrait
{
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $templateFactory = app(TemplateFactory::class);
        $templateFields = $templateFactory->getTemplateFields($data['template']);
        $cmsContent = Arr::only($data, $templateFields);

        foreach ($cmsContent as $name => $value) {
            $this->record->contents()->updateOrCreate(
                ['name' => $name],
                ['value' => $value]
            );
        }

        return Arr::except($data, $templateFields);
    }
}
