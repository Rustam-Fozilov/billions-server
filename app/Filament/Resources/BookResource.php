<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        $categories = Category::query();

        return $form
            ->schema([
                Group::make()
                ->schema([
                    Section::make([
                        TextInput::make('name.uz')->label('Name Uz')->required(),
                        TextInput::make('name.ru')->label('Name Ru')->required(),
                    ])->columns(2),
                    Section::make([
                        MarkdownEditor::make('description.uz')->label('Description Uz')->required(),
                        MarkdownEditor::make('description.ru')->label('Description Ru')->required(),
                        MarkdownEditor::make('short_description.uz')->label('Short Description Uz'),
                        MarkdownEditor::make('short_description.ru')->label('Short Description Ru'),
                    ]),
                ]),

                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('quantity')->integer()->required(),
                            TextInput::make('number_of_pages')->label('Number of pages')->required(),
                            TextInput::make('year')->integer()->required(),
                            TextInput::make('language')->required(),
                            TextInput::make('cover_type')->required(),
                        ])->columns(2),
                    ]),

//                dd(Category::all()->pluck('name.uz')->first()),
                Group::make()
                    ->schema([
                        Section::make([
                            Select::make('category_id')
                                ->label('Category')
                                ->options(Category::all()->pluck('name.uz'))
                                ->searchable()
                                ->required(),
                            Select::make('author_id')
                                ->label('Author')
                                ->options(Author::all()->pluck('first_name.uz', 'id'))
                                ->searchable()
                                ->required(),
                        ])->columns(2),

                        Section::make([
                            TextInput::make('price')->label('Price')->required()->integer(),
                            FileUpload::make('images.link')->label('Image 1')->required(),
                            FileUpload::make('images.link')->label('Image 2'),
                            FileUpload::make('images.link')->label('Image 3'),
                            FileUpload::make('images.link')->label('Image 4'),
                            FileUpload::make('images.link')->label('Image 5'),
                            FileUpload::make('images.link')->label('Image 6'),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name.uz')->limit(20),
                Tables\Columns\TextColumn::make('category.name.uz')->label('Category'),
                Tables\Columns\TextColumn::make('author.first_name.uz')->label('Author'),
                Tables\Columns\TextColumn::make('currency_prices.price')->label('Price'),
                Tables\Columns\TextColumn::make('short_description.uz')->limit(20),
                Tables\Columns\TextColumn::make('description.uz')->limit(20),
                Tables\Columns\TextColumn::make('created_at'),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
