<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Filament\Resources\Traits\MutateDataBeforeFillTrait;
use App\Filament\Resources\Traits\MutateDateBeforeSaveTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    use MutateDateBeforeSaveTrait;
    use mutateDataBeforeFillTrait;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
