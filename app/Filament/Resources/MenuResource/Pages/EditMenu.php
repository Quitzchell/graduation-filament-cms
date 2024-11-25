<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class EditMenu extends EditRecord
{
    protected static string $resource = MenuResource::class;

    public function getTitle(): string|Htmlable
    {
        return __(ucwords(Str::replaceFirst('Menu', $this->record->name, parent::getTitle())));
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
