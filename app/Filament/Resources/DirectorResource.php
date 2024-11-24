<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DirectorResource\Pages;
use App\Models\Director;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DirectorResource extends Resource
{
    protected static ?string $navigationGroup = 'Reviews';

    protected static ?string $navigationParentItem = 'Movies';

    protected static ?string $model = Director::class;

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
                    Select::make('movies')
                        ->label('Movies')
                        ->multiple()
                        ->searchable()
                        ->preload(10)
                        ->relationship('movies', 'title'),
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
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDirectors::route('/'),
            'create' => Pages\CreateDirector::route('/create'),
            'edit' => Pages\EditDirector::route('/{record}/edit'),
        ];
    }
}
