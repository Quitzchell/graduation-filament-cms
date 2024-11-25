<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Filament\Resources\Traits\MutateDataBeforeCreateTrait;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use MutateDataBeforeCreateTrait;

    protected static string $resource = PageResource::class;
}
