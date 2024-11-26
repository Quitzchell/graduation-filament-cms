<?php

namespace App\Filament\Resources;

use App\Cms\TemplateFactory;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\Traits\UniqueSlugTrait;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    use UniqueSlugTrait;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Page title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(static::createSlug('uri')),

                    Forms\Components\TextInput::make('uri')
                        ->label('Page uri')
                        ->unique(ignoreRecord: true)
                        ->required(),

                    Forms\Components\Select::make('template')
                        ->options(TemplateFactory::getTemplateNames())
                        ->required()
                        ->live(),

                    Forms\Components\Section::make()
                        ->schema(function (Get $get) {
                            if ($get('template')) {
                                return TemplateFactory::loadTemplateSchema($get('template'));
                            }

                            return [];
                        }),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Page name'),
                Tables\Columns\TextColumn::make('template')
                    ->formatStateUsing(fn ($state) => $state::getName()),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
