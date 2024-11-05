<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Filament\Resources\Traits\MutateDataBeforeSaveTrait;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use MutateDataBeforeSaveTrait;

    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->mutateData($data);
    }
}
