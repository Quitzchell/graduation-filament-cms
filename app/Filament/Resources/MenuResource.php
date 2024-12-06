<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Menu';

    protected static ?string $model = Menu::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\Repeater::make('items')
                    ->relationship('items')
                    ->label('Menu items')
                    ->reorderable()
                    ->orderColumn()
                    ->schema([
                        Select::make('page_id')
                            ->label('Menu item')
                            ->relationship('page', 'name')
                            ->live()
                            ->required(),

                        Repeater::make('children')
                            ->relationship('children')
                            ->reorderable()
                            ->orderColumn()
                            ->defaultItems(0)
                            ->live()
                            ->hidden(fn (Get $get): bool => empty($get('page_id')))
                            ->simple(
                                Select::make('page_id')
                                    ->relationship('page', 'name')
                                    ->label('Submenu item')
                            )
                            ->mutateRelationshipDataBeforeSaveUsing(function ($state, $data, $record) {
                                $data['menu_id'] = $record->menu_id;

                                return $data;
                            })
                            ->mutateRelationshipDataBeforeCreateUsing(function ($state, $data, $record) {
                                $data['menu_id'] = $record->menu_id;

                                return $data;
                            }),
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
