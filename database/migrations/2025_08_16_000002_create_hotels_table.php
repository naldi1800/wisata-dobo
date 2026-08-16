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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable()->index();
            $table->decimal('longitude', 11, 8)->nullable()->index();
            $table->text('description')->nullable();
            $table->string('hotel_class', 50)->nullable();
            $table->string('check_in_time', 50)->nullable();
            $table->string('check_out_time', 50)->nullable();
            $table->decimal('price_start', 15, 2)->nullable();
            $table->integer('room_count')->nullable();
            $table->json('facilities')->nullable();
            $table->boolean('has_parking')->default(false);
            $table->boolean('has_pool')->default(false);
            $table->string('featured_image')->nullable();
            $table->string('video')->nullable();
            $table->text('google_maps_url')->nullable();
            $table->string('contact')->nullable();
            $table->string('website')->nullable();
            $table->decimal('rating', 4, 2)->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->softDeletes()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
