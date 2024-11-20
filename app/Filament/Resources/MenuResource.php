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
    protected static ?string $model = Menu::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Repeater::make('menuPages')
                        ->label('Menu items')
                        ->relationship()
                        ->collapsible()
                        ->schema([
                            Select::make('page_id')
                                ->label('Menu item')
                                ->relationship('page', 'name')
                                ->required()
                                ->reactive(),

                            Repeater::make('children')
                                ->label('Submenu items')
                                ->hidden(fn (Get $get): bool => empty($get('page_id')))
                                ->reactive()
                                ->simple(
                                    Select::make('child_id')
                                        ->relationship('page', 'name')
                                        ->label('Child Page')
                                )
                                ->afterStateHydrated(function ($record, $get, Forms\Set $set) {
                                    if ($record) {
                                        $recordKey = $record->getKey();
                                        $set("../../menuPages.record-$recordKey.children", array_map(function ($child) {
                                            return ['child_id' => $child];
                                        }, $record->children));
                                    }
                                }),
                        ])
                        ->mutateRelationshipDataBeforeSaveUsing(function ($data, $record) {
                            $record->page_id = $data['page_id'];
                            $record->children = $data['children'] ?? [];

                            $record->save();
                        }),
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
