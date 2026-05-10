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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('slug');
            $table->text('content');
            $table->foreignId('author_id')->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->string('image');
            $table->boolean('slide')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('current')->default(false);
            $table->integer('views')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
