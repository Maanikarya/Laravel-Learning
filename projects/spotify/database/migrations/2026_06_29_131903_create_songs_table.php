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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained()->cascadeOnDelete();
            $table->foreignId('genre_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->integer('duration');
            $table->string('audio_path');
            $table->string('cover_image')->nullable();
            $table->unsignedBigInteger('play_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->index('title');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
