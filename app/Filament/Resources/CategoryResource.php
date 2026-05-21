<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Illuminate\Validation\Rules\Unique;
class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('a_name')
                ->label('Name (Arb)')
                ->extraAttributes(['style' => 'direction: rtl;'])
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
                while (Category::where('slug', $slug)
                    ->where('id', '!=', $get('id') ?? null) // <-- Safely handles null (new records)
                    ->exists()) {
                    $slug = $baseSlug . '-' . $counter++; // Append incrementing number
                }

                $set('slug', $slug);
            })
                ->live(onBlur:true)
                ->required(),
    
            Forms\Components\TextInput::make('name')
                ->label('Name (Eng)')
                ->required(),
    
            Forms\Components\TextInput::make('slug')
                ->helperText('Slug will be automatically created from the English name.')
                ->default('')
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\Toggle::make('shown')
                ->label('Show on Homepage')
                ->helperText('Enable this to display the category on the homepage.')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('a_name')
                    ->label('Name (Arb)')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->searchable(),
                    Tables\Columns\TextColumn::make('name')
                    ->label('Name (Eng)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('shown')
                    ->label('Show')
                    ->tooltip('Enable this to display the category on the homepage.')
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
