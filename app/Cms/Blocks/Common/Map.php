<?php

namespace App\Cms\Blocks\Common;

use App\Cms\Blocks\Interfaces\BlockContract;
use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
use Cheesegrits\FilamentGoogleMaps\Fields\Map as GoogleMapPicker;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class Map implements BlockContract
{
    public static function getBlock(): Block
    {
        return Block::make('common\map')
            ->label('Map')
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

    public static function resolve(array $block)
    {
        return [
            'title' => $block['title'],
            'text' => $block['text'],
            'location' => implode(',', [$block['location']['lat'], $block['location']['lng']]),
            'mapKey' => config('services.google_maps_key'),
        ];
    }
}
