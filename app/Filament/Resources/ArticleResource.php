<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\TextInput::make('topic')
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
                while (Article::where('slug', $slug)
                    ->where('id', '!=', $get('id') ?? null) // <-- Safely handles null (new records)
                    ->exists()) {
                    $slug = $baseSlug . '-' . $counter++; // Append incrementing number
                }

                $set('slug', $slug);
            })
            ->required(),
                Forms\Components\TextInput::make('slug')
                    ->unique(ignoreRecord:true)
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->fileAttachmentsDirectory('attachments')
                    ->columnSpanFull(),
                Forms\Components\Select::make('author_id')
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        Forms\Components\TextInput::make('slug')
                            ->required(),
                        Forms\Components\FileUpload::make('photo')->image(),
                        Forms\Components\Textarea::make('details')
                            ->columnSpanFull(),
                    ])
                    ->native(false)
                    ->preload()
                    ->relationship('author', 'name'),
                Forms\Components\Select::make('category_id')
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->relationship('category', 'a_name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('a_name')
                            ->label('Name (Arb)')
                            ->required(),

                        Forms\Components\TextInput::make('name')
                            ->label('Name (Eng)')
                            ->afterStateUpdated(function ($get, $set, ?string $state) {
                                if (filled($state)) {
                                    $set('slug', Str::slug($state));
                                }
                            })
                            ->live(onBlur: true)
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
                    ]),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('article')
                    ->moveFiles()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '975:573',
                        '970:573',
                    ])
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Toggle::make('slide')
                    ->label('Show as slide')
                    ->reactive()
                    ->helperText('Enable this to display this article as slide on the homepage.')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('featured', false);
                            $set('current', false);
                        }
                    }),

                Forms\Components\Toggle::make('featured')
                    ->label('Show as featured article')
                    ->reactive()
                    ->helperText('Enable this to display this article as featured on the homepage.')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('slide', false);
                            $set('current', false);
                        }
                    }),

                Forms\Components\Toggle::make('current')
                    ->label('Show as current affair')
                    ->reactive()
                    ->helperText('Enable this to display this article as current affair on the homepage.')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('slide', false);
                            $set('featured', false);
                        }
                    }),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('topic')
                    ->searchable()
                    ->formatStateUsing(fn($state) => Str::limit($state, 50))
                    ->extraAttributes(['style' => 'direction: rtl;']),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('author.name')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.a_name')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\ToggleColumn::make('slide')
                    ->label('Slide')
                    ->tooltip('Enable this to display this article as slide on the homepage.')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('featured')
                    ->label('Featured')
                    ->tooltip('Enable this to display this article as featured on the homepage.')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('current')
                    ->label('Current')
                    ->tooltip('Enable this to display this article as current affair on the homepage.')
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
    public static function createArabicSlug($string, $separator = '-')
    {
        // Convert to lowercase
        $string = mb_strtolower($string, 'UTF-8');

        // Keep only Arabic characters and spaces (no Latin, English, or other characters)
        // This will strip out any Latin, numeric, or special characters
        $string = preg_replace("/[^ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى\s]/u", '', $string);

        // Replace multiple spaces or unwanted separators with the chosen separator
        $string = preg_replace("/[\s]+/", $separator, $string);

        // Trim leading/trailing separators
        $string = trim($string, $separator);

        return $string;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
