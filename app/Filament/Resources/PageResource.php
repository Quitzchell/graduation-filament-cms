<?php

namespace App\Filament\Resources;

use App\Cms\TemplateFactory;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PageResource extends Resource
{
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
                        ->unique(ignoreRecord: true)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                            if (($get('uri') ?? '') !== Str::slug($old)) {
                                return;
                            }
                            $set('uri', Str::slug($state));
                        }),

                    Forms\Components\TextInput::make('uri')
                        ->label('Page uri')
                        ->unique(ignoreRecord: true)
                        ->readOnly(),

                    Forms\Components\Select::make('template')
                        ->options(TemplateFactory::getTemplateNames())
                        ->required()
                        ->live(),

                    Forms\Components\Section::make()->schema(function (Get $get) {
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
                    ->formatStateUsing(fn ($state) => class_basename($state)),
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
