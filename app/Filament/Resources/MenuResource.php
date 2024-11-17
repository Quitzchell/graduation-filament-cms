<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Components\Component;
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
                    Forms\Components\Repeater::make('pages')
                        ->label('Pages')
                        ->relationship('Pages')
                        ->schema([
                            Select::make('page_id')
                                ->label('Page')
                                ->relationship('menu.pages', 'name')
                                ->preload(10)
                                ->searchable()
                                ->required(),
                        ])
                        ->saveRelationshipsUsing(function ($state, $record) {
                            foreach ($record->pages as $existingPage) {
                                if (! collect($state)->contains('page_id', $existingPage->id)) {
                                    $existingPage->menu_id = null;
                                    $existingPage->save();
                                }
                            }

                            foreach ($state as $page) {
                                $pageModel = Page::find($page['page_id']);

                                if ($pageModel) {
                                    $pageModel->menu_id = $record->getKey();
                                    $pageModel->save();
                                }
                            }

                            $record->load('pages');
                        })
                        ->afterStateHydrated(function (Component $component, $record, callable $get, callable $set) {
                            if ($record && $record->pages->isNotEmpty()) {
                                $set('pages', $record->pages->map(function ($page) {
                                    return ['page_id' => $page->id];
                                })->toArray());
                            }
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
