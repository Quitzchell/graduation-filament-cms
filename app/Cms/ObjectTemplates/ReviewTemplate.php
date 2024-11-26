<?php

namespace App\Cms\ObjectTemplates;

use App\Cms\Blocks\Common\CallToAction;
use App\Cms\Blocks\Common\Image;
use App\Cms\Blocks\Common\Map;
use App\Cms\Blocks\Common\Paragraph;
use App\Cms\ObjectTemplates\Interface\HasObjectTemplateSchema;
use Filament\Forms\Components\Builder;

class ReviewTemplate implements HasObjectTemplateSchema
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
}
