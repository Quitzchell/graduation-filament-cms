<?php

namespace App\Cms\Blocks;

use App\Cms\Blocks\Interfaces\BlockContract;
use Cheesegrits\FilamentGoogleMaps\Fields\Map as GoogleMapPicker;
use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
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

                GoogleMapPicker::make('location')
                    ->label('Location')
                    ->geolocateOnLoad()
                    ->reactive()
                    ->afterStateHydrated(function ($state, $record, callable $set) {
                        if ($record) {
                            $set('location', [
                                'lat' => $record->location['lat'] ?? null,
                                'lng' => $record->location['lng'] ?? null,
                            ]);
                        }
                    })
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
                    ->geocodeOnLoad()
                    ->isLocation()
                    ->reactive()
                    ->afterStateHydrated(function ($state, $record, callable $set) {
                        if ($record) {
                            $set('address', $record->address ?? '');
                        }
                    })
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (!empty($state['lat']) && !empty($state['lng'])) {
                            $set('location.lat', $state['lat']);
                            $set('location.lng', $state['lng']);
                        }
                    }),
            ]);
    }
}
