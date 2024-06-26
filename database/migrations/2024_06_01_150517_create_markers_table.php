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
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->string('tempat');
            $table->text('keterangan');
            $table->string('address');
            $table->integer('categories_id');
            $table->string('image');
            $table->string('longitude');
            $table->string('latitude');
            $table->bigInteger('price_start');
            $table->bigInteger('price_end');
            $table->text('youtube_link');
            $table->text('link');
            $table->text('navlink');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markers');
    }
};
