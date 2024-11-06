<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Filament\Resources\Traits\MutateDataBeforeTrait;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use MutateDataBeforeTrait;

    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->mutateData($data);
    }
}
