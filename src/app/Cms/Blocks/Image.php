<?php

namespace App\Cms\Blocks;

use App\Cms\Blocks\Interfaces\BlockContract;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;

class Image implements BlockContract
{

    public static function getBlock(): Block
    {
        return Block::make('image')
            ->schema([
                FileUpload::make('image')
                    ->label('image')
            ]);
    }
}
