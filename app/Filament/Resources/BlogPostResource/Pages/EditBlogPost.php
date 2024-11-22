<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Resources\BlogPostResource;
use App\Filament\Resources\Traits\MutateDataBeforeFillTrait;
use App\Filament\Resources\Traits\MutateDateBeforeSaveTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogPost extends EditRecord
{
    use mutateDataBeforeFillTrait;
    use MutateDateBeforeSaveTrait;

    protected static string $resource = BlogPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
