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
        Schema::table('technologies', function (Blueprint $table) {
            $table->integer('order')->default(0)->nullable()->change();
        });
        Schema::table('social_media', function (Blueprint $table) {
            $table->integer('order')->default(0)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->string('order')->default(0)->nullable()->change();
        });
        Schema::table('social_media', function (Blueprint $table) {
            $table->string('order')->default(0)->nullable()->change();
        });
    }
};
