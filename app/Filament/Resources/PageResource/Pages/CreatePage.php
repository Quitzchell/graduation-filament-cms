<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Filament\Resources\Traits\MutateDataBeforeCreateOrUpdateTrait;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use MutateDataBeforeCreateOrUpdateTrait;

    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->beforeCreateOrUpdateMutation($data);
    }
}
