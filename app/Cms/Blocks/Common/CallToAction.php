<?php

namespace App\Cms\Blocks\Common;

use App\Cms\Blocks\Interfaces\HasBlockSchema;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;

class CallToAction implements HasBlockSchema
{
    public static function getNamespace(): string
    {
        return 'Common';
    }

    public static function getBlock(): Block
    {
        return Block::make('callToAction')
            ->label('Call to Action')
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
                Select::make('urlable_id')
                    ->label('Button URL')
                    ->options(function () {
                        $options = [];

                        foreach (getUrlableModels() as $modelClass) {
                            foreach ($modelClass::all() as $instance) {
                                $options["{$modelClass}:{$instance->id}"] = sprintf('%s - %s',
                                    class_basename($modelClass), $instance->title ?? $instance->name);
                            }
                        }

                        return $options;
                    })
                    ->searchable(),
                TextInput::make('button_text')
                    ->label('Button text'),
            ]);
    }

    public function resolve(array $blockData): array
    {
        [$classname, $id] = explode(':', $blockData['urlable_id']);

        return [
            'title' => $blockData['title'],
            'text' => $blockData['text'],
            'buttonUrl' => $classname::find($id)->uri(),
            'buttonText' => $blockData['button_text'],
        ];
    }
}
