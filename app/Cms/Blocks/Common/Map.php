<?php

namespace App\Cms\Blocks\Common;

use App\Cms\Blocks\Interfaces\HasBlockSchema;
use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
use Cheesegrits\FilamentGoogleMaps\Fields\Map as GoogleMapPicker;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;

class Map implements HasBlockSchema
{
    public static function getNamespace(): string
    {
        return 'Common';
    }

    public static function getBlock(): Block
    {
        return Block::make('map')
            ->label('Map')
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

                GoogleMapPicker::make('location')
                    ->label('Location')
                    ->draggable(false)
                    ->mapControls([
                        'mapTypeControl' => false,
                        'scaleControl' => false,
                        'streetViewControl' => false,
                        'rotateControl' => false,
                        'fullscreenControl' => false,
                        'searchBoxControl' => false,
                        'zoomControl' => false,
                    ]),

                Geocomplete::make('address')
                    ->label('Address')
                    ->placeholder('Start typing an address...')
                    ->isLocation()
                    ->geocodeOnLoad()
                    ->minChars(5)
                    ->live()
                    ->afterStateHydrated(function ($state, callable $set) {
                        if (isset($state['formatted']) || ! isset($state['formatted_address'])) {
                            $set('address.formatted_address', $state['formatted'] ?? '');
                        }
                    })
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (! empty($state['formatted_address'])) {
                            $set('address.formatted', $state['formatted_address']);
                        }
                        if (! empty($state['lat']) && ! empty($state['lng'])) {
                            $set('location.lat', $state['lat']);
                            $set('location.lng', $state['lng']);
                        }
                    }),
            ]);
    }

    public function resolve(array $blockData): array
    {
        return [
            'title' => $blockData['title'],
            'text' => $blockData['text'],
            'location' => implode(',', [$blockData['location']['lat'], $blockData['location']['lng']]),
            'mapKey' => config('services.google_maps_key'),
        ];
    }
}
