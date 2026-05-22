<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['topic'])) {
            $slug = mb_strtolower($data['topic'], 'UTF-8');
            $slug = preg_replace('/[^a-z0-9\p{Arabic}_\s-]+/u', '', $slug);
            $slug = preg_replace('/[_\s-]+/u', '-', $slug);
            $slug = trim($slug, '-');
            $slug = mb_substr($slug, 0, 100, 'UTF-8');

            $baseSlug = $slug;
            $counter = 1;

            while (\App\Models\Article::where('slug', $slug)->where('id', '!=', $this->record->id)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }

            $data['slug'] = $slug;
        }

        return $data;
    }
}
