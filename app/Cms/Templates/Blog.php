<?php

namespace App\Cms\Templates;

use App\Actions\Abstracts\ObjectResolver;
use App\Actions\Abstracts\TemplateResolver;
use App\Actions\Blocks\BlockResolver;
use App\Actions\Blog\ResolveBlogOverviewAction;
use App\Cms\Blocks\Common\CallToAction;
use App\Cms\Blocks\Common\Image;
use App\Cms\Blocks\Common\Map;
use App\Cms\Blocks\Common\Paragraph;
use App\Cms\Templates\Interfaces\HasFormSchema;
use App\Cms\Templates\Interfaces\HasTemplateRenderer;
use App\Models\Schemas\BlogPost;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class Blog implements HasFormSchema, HasTemplateRenderer
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

            Builder::make('blocks')
                ->schema([
                    CallToAction::getBlock(),
                    Image::getBlock(),
                    Map::getBlock(),
                    Paragraph::getBlock(),
                ]),
        ];
    }

    public function getRenderer(...$segments): TemplateResolver|ObjectResolver
    {
        if (count($segments) > 1) {
            return (new BlogPost())->getRenderer();
        };
        return new ResolveBlogOverviewAction(new BlockResolver);
    }
}
