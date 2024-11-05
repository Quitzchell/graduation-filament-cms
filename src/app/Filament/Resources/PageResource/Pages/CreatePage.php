<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Cms\TemplateFactory;
use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{

    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
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
