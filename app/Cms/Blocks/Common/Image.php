<?php

namespace App\Cms\Blocks\Common;

use App\Cms\Blocks\Interfaces\HasBlockSchema;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Set;

class Image implements HasBlockSchema
{
    public static function getNamespace(): string
    {
        return "Common";
    }

    public static function getBlock(): Block
    {
        return Block::make('image')
            ->label('Image')
            ->schema([
                Hidden::make('namespace')
                    ->afterStateHydrated(fn(Set $set) => $set('namespace', static::getNamespace())),
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->preserveFilenames(),
            ]);
    }

    public function resolve(array $blockData): array
    {
        return [
            'image' => asset('storage/'.$blockData['image']),
        ];
    }
}
