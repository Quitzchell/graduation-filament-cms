<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use App\Filament\Resources\Traits\MutateDataBeforeFillTrait;
use App\Filament\Resources\Traits\MutateDateBeforeSaveTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReview extends EditRecord
{
    use mutateDataBeforeFillTrait;
    use MutateDateBeforeSaveTrait;

    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
