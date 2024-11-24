<?php

namespace App\Filament\Resources;

use App\Cms\ObjectContentSchemas\BlogPost as BlogPostSchema;
use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\Traits\UniqueSlugTrait;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogPostResource extends Resource
{
    use UniqueSlugTrait;

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->placeholder('Title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(static::createSlug('slug')),

                    Forms\Components\TextInput::make('slug')
                        ->label('Post uri')
                        ->unique(ignoreRecord: true)
                        ->required(),

                    TextArea::make('excerpt')
                        ->autosize()
                        ->label('Excerpt'),

                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->preserveFilenames()
                        ->required(),

                    Forms\Components\Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->required(),

                    Forms\Components\DatePicker::make('published_at')
                        ->label('Published at')
                        ->displayFormat('d-m-Y')
                        ->required(),

                    Forms\Components\ToggleButtons::make('Published')
                        ->label('Published')
                        ->boolean()
                        ->inline()
                        ->required(),
                ]),

                Forms\Components\Hidden::make('template')
                    ->afterStateHydrated(fn (Set $set) => $set('template', BlogPostSchema::class)),
                Forms\Components\Section::make('Content')
                    ->schema(BlogPostSchema::getForm()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable(),
                TextColumn::make('published_at')
                    ->label('Published at')
                    ->date('d-m-Y')
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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
