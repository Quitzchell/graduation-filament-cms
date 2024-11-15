<?php

namespace App\Cms\Templates;

use App\Cms\Blocks\CallToAction;
use App\Cms\Blocks\Image;
use App\Cms\Blocks\Map;
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
                ->label('Header title'),

            FileUpload::make('header_image')
                ->label('Header Image')
                ->image()
                ->required(),

            Builder::make('blocks')->schema([
                CallToAction::getBlock(),
                Image::getBlock(),
                Map::getBlock(),
                Paragraph::getBlock(),
            ]),
        ];
    }
}
