<?php

namespace App\Cms\Templates\Blog;

use App\Cms\Actions\BlockResolver;
use App\Cms\Actions\TemplateResolver;
use App\Cms\Blocks\Common\CallToAction;
use App\Cms\Blocks\Common\Image;
use App\Cms\Blocks\Common\Map;
use App\Cms\Blocks\Common\Paragraph;
use App\Cms\Templates\Blog\Actions\ResolveBlogAction;
use App\Cms\Templates\Interfaces\HasTemplateSchema;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class Blog implements HasTemplateSchema
{
    public static function getForm(): array
    {
        return [
            TextInput::make('header_title')
                ->label('Header title'),

            FileUpload::make('header_image')
                ->label('Header Image')
                ->image()
                ->preserveFilenames()
                ->required(),

            Builder::make('blocks')->schema([
                CallToAction::getBlock(),
                Image::getBlock(),
                Map::getBlock(),
                Paragraph::getBlock(),
            ]),
        ];
    }

    public function getRenderer(): TemplateResolver
    {
        return new ResolveBlogAction(new BlockResolver);
    }
}
