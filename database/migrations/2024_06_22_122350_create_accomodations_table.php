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
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('accomodation_address');
            $table->bigInteger('markers_id');
            $table->bigInteger('start_price');
            $table->bigInteger('end_price');
            $table->text('traveloka_link');
            $table->string('thumb_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomodations');
    }
};
