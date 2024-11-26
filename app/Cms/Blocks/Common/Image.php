<?php

namespace App\Cms\Blocks\Common;

use App\Cms\Blocks\Interfaces\HasBlockSchema;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;

class Image implements HasBlockSchema
{
    public static function getBlock(): Block
    {
        return Block::make('common\image')
            ->label('Image')
            ->schema([
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->preserveFilenames(),
            ]);
    }

    public static function resolve(array $blockData): array
    {
        return [
            'image' => asset('storage/'.$blockData['image']),
        ];
    }
}
