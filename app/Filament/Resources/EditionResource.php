<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EditionResource\Pages;
use App\Filament\Resources\EditionResource\RelationManagers;
use App\Models\Edition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EditionResource extends Resource
{
    protected static ?string $model = Edition::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('edition')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->url()
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->moveFiles()
                    ->directory('editions')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '233:304',
                        '235:304'
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('pdf')
                    ->acceptedFileTypes(['application/pdf'])
                    ->label('Upload PDF')
                    ->moveFiles()
                    ->default('0')
                    ->directory('editions/pdf')
                    ->required(),
                Forms\Components\DatePicker::make('published_date')
                    ->native(false)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('edition')
                    ->extraAttributes(['style' => 'direction: rtl;'])
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('published_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('viewPdf')
                    ->label('')
                    ->slideOver()
                    ->modalSubmitAction(false)
                    ->color('success')
                    ->icon('heroicon-s-document-text')
                    ->modalHeading('PDF Preview')
                    ->modalWidth('4xl')
                    ->modalContent(fn($record) => view('pdf-viewer', [
                        'pdfUrl' => asset('storage/' . $record->pdf),
                    ])),
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
            'index' => Pages\ListEditions::route('/'),
            'create' => Pages\CreateEdition::route('/create'),
            'edit' => Pages\EditEdition::route('/{record}/edit'),
        ];
    }
}
