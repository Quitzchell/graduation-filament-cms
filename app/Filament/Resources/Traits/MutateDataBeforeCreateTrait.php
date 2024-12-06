<?php

namespace App\Filament\Resources\Traits;

use App\Cms\TemplateFactory;
use Illuminate\Support\Arr;

trait MutateDataBeforeCreateTrait
{
    private array $cmsContent;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $templateFactory = app(TemplateFactory::class);
        if (! empty($data['template'])) {
            $templateFields = $templateFactory->getTemplateFields($data['template']);
            $this->cmsContent = Arr::only($data, $templateFields);
        }

        return Arr::except($data, $templateFields ?? []);
    }

    protected function afterCreate(): void
    {
        if ($this->cmsContent) {
            foreach ($this->cmsContent as $name => $value) {
                $this->record->contents()->create(['name' => $name, 'value' => $value]);
            }
        }
    }
}
