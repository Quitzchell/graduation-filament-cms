<?php

namespace App\Models\Schemas;

use App\Actions\Abstracts\ObjectResolver;
use App\Actions\Blocks\BlockResolver;
use App\Actions\Blog\RenderBlogDetailAction;
use App\Cms\Blocks\Common\CallToAction;
use App\Cms\Blocks\Common\Image;
use App\Cms\Blocks\Common\Map;
use App\Cms\Blocks\Common\Paragraph;
use App\Cms\Templates\Interfaces\HasFormSchema;
use Filament\Forms\Components\Builder;

class BlogPost implements HasFormSchema, HasObjectRenderer
{
    public static function getForm(): array
    {
        return [
            Builder::make('blocks')
                ->schema([
                    CallToAction::getBlock(),
                    Image::getBlock(),
                    Map::getBlock(),
                    Paragraph::getBlock(),
                ]),
        ];
    }

    public function getRenderer(): ObjectResolver
    {
        return new RenderBlogDetailAction(new BlockResolver);
    }
}
