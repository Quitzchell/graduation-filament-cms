<?php

namespace App\Cms\Blocks;

use App\Cms\Blocks\Interfaces\BlockContract;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class CallToAction implements BlockContract
{
    public static function getBlock(): Block
    {
        return Block::make('callToAction')
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
                Select::make('urlable_id')
                    ->label('Button URL')
                    ->options(function () {
                        $options = [];

                        foreach (config('urlable.models') as $modelClass) {
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
}
