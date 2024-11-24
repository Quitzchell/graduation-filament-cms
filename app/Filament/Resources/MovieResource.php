<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\Traits\UniqueSlugTrait;
use App\Models\Movie;
use Filament\Forms;
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
    use UniqueSlugTrait;

    protected static ?string $model = Movie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(static::createSlug('slug')),

                    Forms\Components\Hidden::make('slug')
                        ->unique(ignoreRecord: true)
                        ->required(),

                    TextInput::make('release_year')
                        ->label('Year of release')
                        ->numeric()
                        ->default(now()->year)
                        ->minValue(1800)
                        ->maxValue(2100),

                    TextArea::make('description')
                        ->label('Description'),
                ]),

                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('actors')
                        ->label('Actors')
                        ->multiple()
                        ->relationship('actors', 'surname')
                        ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->full_name}")
                        ->preload(10)
                        ->createOptionForm(ActorResource::externalFormFields())
                        ->editOptionForm(ActorResource::externalFormFields()),
                ]),

                Forms\Components\Section::make()->schema([
                    TextInput::make('trailer_url')
                        ->label('Trailer link (YouTube)')
                        ->url()
                        ->regex('/^(https?:\/\/(?:www\.)?youtube\.com\/(?:watch\?v=|embed\/|v\/|e\/|videoseries\?v=)[a-zA-Z0-9_-]{11}(?:\?.*)?|https?:\/\/youtu\.be\/[a-zA-Z0-9_-]{11}(?:\?.*)?)$/')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, $set) => $set('trailer_id', getYouTubeVideoId($state))),

                    Forms\Components\Hidden::make('trailer_id')
                        ->afterStateHydrated(fn ($state, $set) => $set('trailer_url', 'https://www.youtube.com/embed/'.getYouTubeVideoId($state))),
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
