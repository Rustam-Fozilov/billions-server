<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name.uz')->label('First name uz')->required(),
                Forms\Components\TextInput::make('last_name.uz')->label('Last name uz')->required(),
                Forms\Components\TextInput::make('first_name.ru')->label('First name ru')->required(),
                Forms\Components\TextInput::make('last_name.ru')->label('Last name ru')->required(),
                Forms\Components\MarkdownEditor::make('description.uz')->label('Description uz')->required(),
                Forms\Components\MarkdownEditor::make('description.ru')->label('Description ru')->required(),
                Forms\Components\FileUpload::make('photo')->label('Photo')
                    ->disk('public')
                    ->directory('images/authors')
                    ->moveFiles()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name.uz'),
                Tables\Columns\TextColumn::make('last_name.uz'),
                Tables\Columns\ImageColumn::make('photo')
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
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
