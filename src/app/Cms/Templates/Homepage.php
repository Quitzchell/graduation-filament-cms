<?php

namespace App\Cms\Templates;

use App\Cms\Blocks\Paragraph;
use App\Cms\Templates\Interfaces\TemplateContract;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class Homepage implements TemplateContract
{

    public static function getForm(): array
    {
        return [
            TextInput::make('header_title')
                ->label('Header title')
                ->required(),

            FileUpload::make('header_image')
                ->label('Header image')
                ->live()
                ->required(),

            Builder::make('content')->schema([
                Paragraph::getBlock()
            ])
        ];
    }
}
