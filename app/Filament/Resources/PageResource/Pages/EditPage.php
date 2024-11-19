<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Filament\Resources\Traits\MutateDataBeforeCreateOrUpdateTrait;
use App\Filament\Resources\Traits\MutateDataBeforeFillTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    use MutateDataBeforeCreateOrUpdateTrait;
    use mutateDataBeforeFillTrait;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->beforeFillMutation($data);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $this->beforeCreateOrUpdateMutation($data);
    }
}
