<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set, $get) { // <-- $get is now available
                if (empty($state)) {
                    $set('slug', '');
                    return;
                }

                // Generate base slug (supports Arabic + UTF-8)
                $slug = mb_strtolower($state, 'UTF-8');
                $slug = preg_replace('/[^a-z0-9\p{Arabic}_\s-]+/u', '', $slug);
                $slug = preg_replace('/[_\s-]+/u', '-', $slug);
                $slug = trim($slug, '-');
                $slug = substr($slug, 0, 100);

                // Store the base slug before modification
                $baseSlug = $slug;
                $counter = 1;

                // Check for existing slugs (ignore current record if editing)
                while (\App\Models\Author::where('slug', $slug)
                    ->where('id', '!=', $get('id') ?? null) // <-- Safely handles null (new records)
                    ->exists()) {
                    $slug = $baseSlug . '-' . $counter++; // Append incrementing number
                }

                $set('slug', $slug);
            })
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\FileUpload::make('photo')->image(),
                Forms\Components\Textarea::make('details')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('photo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->formatStateUsing(fn ($state) => $state?->format('d M Y h:i A'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->formatStateUsing(fn ($state) => $state?->format('d M Y h:i A'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
