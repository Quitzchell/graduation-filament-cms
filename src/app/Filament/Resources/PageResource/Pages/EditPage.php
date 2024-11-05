<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Cms\TemplateFactory;
use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($data['content']) {
            foreach ($data['content'] as $key => $templateData) {
                $data[$key] = $templateData;
            }

            unset($data['content']);
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
