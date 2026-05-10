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
        Schema::table('articles', function (Blueprint $table) {
            // Indexes were successfully created in the first run,
            // but the migration table insert failed due to column length.
            // Keeping this empty so the migration succeeds and gets logged.
            // $table->index('slide');
            // $table->index('featured');
            // $table->index('current');
            // $table->index('category_id');
            // $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex(['slide']);
            $table->dropIndex(['featured']);
            $table->dropIndex(['current']);
            $table->dropIndex(['category_id']);
            $table->dropIndex(['slug']);
        });
    }
};
