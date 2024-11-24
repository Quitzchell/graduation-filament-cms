<?php

namespace App\Filament\Resources;

use App\Cms\ObjectContentSchemas\Review as ReviewSchema;
use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Books;
use App\Models\Movie;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $navigationGroup = 'Reviews';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    TextInput::make('excerpt')
                        ->label('Excerpt'),
                ]),

                Forms\Components\Section::make()->schema([
                    Forms\Components\MorphToSelect::make('reviewable')
                        ->label('Subject of review')
                        ->columnSpan('full')
                        ->types([
                            Forms\Components\MorphToSelect\Type::make(Movie::class)
                                ->titleAttribute('title'),
                            Forms\Components\MorphToSelect\Type::make(Books::class)
                                ->titleAttribute('title'),
                        ]),
                ]),

                Forms\Components\Section::make()->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->preserveFilenames()
                        ->required(),
                    TextInput::make('score')
                        ->label('Score')
                        ->required(),
                ]),

                Forms\Components\Hidden::make('template')
                    ->afterStateHydrated(fn (Set $set) => $set('template', ReviewSchema::class)),
                Forms\Components\Section::make('Content')
                    ->schema(ReviewSchema::getForm()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title'),
                TextColumn::make('reviewable')
                    ->label('Reviewable')->formatStateUsing(fn ($state) => dd($state)),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
