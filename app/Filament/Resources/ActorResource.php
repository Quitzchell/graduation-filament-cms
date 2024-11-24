<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActorResource\Pages;
use App\Models\Actor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActorResource extends Resource
{
    protected static ?string $model = Actor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([

                    TextInput::make('name')
                        ->label('Name')
                        ->required(),
                    TextInput::make('middle_name')
                        ->label('Middle Name')
                        ->default(''),
                    TextInput::make('surname')
                        ->label('Surname')
                        ->required(),
                    DatePicker::make('date_of_birth')
                        ->label('Date of Birth')
                        ->displayFormat('d-m-Y')
                        ->required(),
                ]),

                Section::make()->schema([
                    Repeater::make('actorMovies')
                        ->relationship()
                        ->schema([
                            Select::make('movie_id')
                                ->label('Movie')
                                ->relationship('movie', 'title')
                                ->pivotData(fn(Get $get) => ['role' => $get('role')]),
                            TextInput::make('role')
                                ->label('Role')
                                ->required()
                        ])
                ]),
            ]);
    }

    public static function externalFormFields(): array
    {
        return [
            TextInput::make('name')
                ->label('Name')
                ->required(),
            TextInput::make('middle_name')
                ->label('Middle Name'),
            TextInput::make('surname')
                ->label('Surname')
                ->required(),
            DatePicker::make('date_of_birth')
                ->label('Date of Birth')
                ->displayFormat('d-m-Y')
                ->required(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable(['name', 'surname'])
                    ->sortable(['name', 'surname']),
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
            'index' => Pages\ListActors::route('/'),
            'create' => Pages\CreateActor::route('/create'),
            'edit' => Pages\EditActor::route('/{record}/edit'),
        ];
    }
}
