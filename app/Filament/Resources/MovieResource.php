<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Models\Movie;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class MovieResource extends Resource
{
    protected static ?string $navigationGroup = 'Reviews';

    protected static ?int $navigationSort = 2;

    protected static ?string $model = Movie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General information')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required(),

                        TextInput::make('release_year')
                            ->label('Year of release')
                            ->numeric()
                            ->required()
                            ->default(now()->year)
                            ->minValue(1800)
                            ->maxValue(2100),

                        TextArea::make('description')
                            ->label('Description'),

                        TextInput::make('trailer_url')
                            ->label('Trailer link (YouTube)')
                            ->url()
                            ->regex('/^(https?:\/\/(?:www\.)?youtube\.com\/(?:watch\?v=|embed\/|v\/|e\/|videoseries\?v=)[a-zA-Z0-9_-]{11}(?:\?.*)?|https?:\/\/youtu\.be\/[a-zA-Z0-9_-]{11}(?:\?.*)?)$/')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, $set) => $set('trailer_id', getYouTubeVideoId($state))),

                        Forms\Components\Hidden::make('trailer_id')
                            ->afterStateHydrated(fn ($state, $set) => $set('trailer_url', 'https://www.youtube.com/embed/'.getYouTubeVideoId($state))),
                    ]),

                Forms\Components\Section::make('Director & Actors')->schema([
                    Select::make('director')
                        ->label('Director')
                        ->relationship('director', 'surname')
                        ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->full_name}")
                        ->searchable()
                        ->preload(10)
                        ->createOptionForm(DirectorResource::externalFormFields()),

                    Repeater::make('actorMovies')
                        ->label('Actors')
                        ->relationship()
                        ->defaultItems(0)
                        ->schema([
                            Forms\Components\Select::make('actor_id')
                                ->label('Actor')
                                ->relationship('actor', 'surname')
                                ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->full_name}")
                                ->searchable()
                                ->preload(10)
                                ->createOptionForm(ActorResource::externalFormFields())
                                ->distinct(),
                            Forms\Components\TagsInput::make('roles')
                                ->label('Roles')
                                ->placeholder('New roles')
                                ->hint('The roles of the actor in the movie')
                                ->required(),
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('release_year')
                    ->label('Year of release')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'edit' => Pages\EditMovie::route('/{record}/edit'),
        ];
    }
}
