<?php

namespace App\Cms\Blocks;

use App\Cms\Blocks\Interfaces\BlockContract;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class About implements BlockContract
{
    public static function getBlock(): Block
    {
        return Block::make('about')
            ->schema([
                TextInput::make('title')
                    ->label('Title'),
                RichEditor::make('text')
                    ->label('Text')
                    ->toolbarButtons([
                        'h1',
                        'h2',
                        'bold',
                        'italic',
                        'underline',
                        'orderedList',
                        'bulletList',
                    ]),
            ]);
    }
}
