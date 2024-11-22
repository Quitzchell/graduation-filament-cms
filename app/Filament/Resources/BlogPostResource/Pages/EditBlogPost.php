<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Resources\BlogPostResource;
use App\Filament\Resources\Traits\MutateDataBeforeCreateTrait;
use App\Filament\Resources\Traits\MutateDataBeforeFillTrait;
use App\Filament\Resources\Traits\MutateDateBeforeSaveTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogPost extends EditRecord
{
    use MutateDateBeforeSaveTrait;
    use mutateDataBeforeFillTrait;

    protected static string $resource = BlogPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
