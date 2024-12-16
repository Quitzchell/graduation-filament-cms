<?php

namespace App\Cms\Blocks\Common;

use App\Cms\Blocks\Interfaces\HasBlockSchema;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;

class Paragraph implements HasBlockSchema
{
    public static function getNamespace(): string
    {
        return 'Common';
    }

    public static function getBlock(): Block
    {
        return Block::make('paragraph')
            ->label('Paragraph')
            ->schema([
                Hidden::make('namespace')
                    ->afterStateHydrated(fn (Set $set) => $set('namespace', static::getNamespace())),
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

    public function resolve(array $blockData): array
    {
        return [
            'title' => $blockData['title'],
            'text' => $blockData['text'],
        ];
    }
}
