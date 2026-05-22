<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix category slugs
        \App\Models\Category::chunk(100, function ($categories) {
            foreach ($categories as $category) {
                if (str_contains($category->slug, ' ')) {
                    $category->slug = str_replace(' ', '-', $category->slug);
                    $category->save();
                }
            }
        });

        // Fix article slugs
        \App\Models\Article::chunk(100, function ($articles) {
            foreach ($articles as $article) {
                if (str_contains($article->slug, ' ')) {
                    $article->slug = str_replace(' ', '-', $article->slug);
                    $article->save();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
