<?php

namespace App\Filament\Resources;

use App\Cms\ObjectTemplates\ReviewTemplate;
use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\Traits\UniqueSlugTrait;
use App\Models\Book;
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
    use UniqueSlugTrait;

    protected static ?string $navigationGroup = 'Reviews';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\MorphToSelect::make('reviewable')
                    ->label('Subject of review')
                    ->columnSpan('full')
                    ->types([
                        Forms\Components\MorphToSelect\Type::make(Movie::class)
                            ->titleAttribute('title'),
                        Forms\Components\MorphToSelect\Type::make(Book::class)
                            ->titleAttribute('title'),
                    ]),

                Forms\Components\Section::make()
                    ->columns()
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(static::createSlug('slug')),
                        Forms\Components\Hidden::make('slug')
                            ->unique(ignoreRecord: true)
                            ->required(),

                        TextInput::make('score')
                            ->label('Score')
                            ->required(),

                        Forms\Components\Textarea::make('excerpt')
                            ->label('Excerpt')
                            ->columnSpan('full'),

                        FileUpload::make('image')
                            ->label('Image')
                            ->columnSpan('full')
                            ->image()
                            ->preserveFilenames()
                            ->required(),

                    ]),

                Forms\Components\Hidden::make('template')
                    ->afterStateHydrated(fn (Set $set) => $set('template', ReviewTemplate::class)),
                Forms\Components\Section::make('Content')
                    ->schema(ReviewTemplate::getForm()),

                Forms\Components\Section::make()->columns()->schema([
                    Forms\Components\DatePicker::make('published_at')
                        ->label('Published at')
                        ->displayFormat('d-m-Y')
                        ->required(),

                    Forms\Components\ToggleButtons::make('published')
                        ->label('Published')
                        ->boolean()
                        ->inline()
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title'),
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
