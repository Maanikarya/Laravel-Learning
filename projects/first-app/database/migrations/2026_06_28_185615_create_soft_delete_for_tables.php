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
        Schema::table('songs', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('genres', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('playlists', function (Blueprint $table) {
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('genres', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('playlists', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

    }
};
