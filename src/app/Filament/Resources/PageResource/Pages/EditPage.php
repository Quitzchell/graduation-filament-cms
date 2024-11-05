<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Filament\Resources\Traits\MutateDataBeforeTrait;
use App\Filament\Resources\Traits\SaveUrlableTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    use MutateDataBeforeTrait;
    use SaveUrlableTrait;

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
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $this->mutateData($data);
    }

    protected function afterSave(): void
    {
        $data = $this->form->getState();
        $this->saveUrlable($this->record, $data);
    }
}
