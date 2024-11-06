<?php

namespace App\Cms\Blocks;

use App\Cms\Blocks\Interfaces\BlockContract;
use App\Forms\Components\GoogleMapEmbedField;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class Map implements BlockContract
{
    public static function getBlock(): Block
    {
        return Block::make('map')
            ->label('Map')
            ->schema([
                TextInput::make('title')
                    ->label('Title'),
                TextInput::make('text')
                    ->label('Text'),
                GoogleMapEmbedField::make('location')
                    ->label('Location'),
            ]);
    }
}

//         $this->title = $block->content('title');
//        $this->text = $block->content('text');
//        $this->location = $block->content('location');
//        $this->mapKey = config('services.google_maps_key');
