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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable()->index();
            $table->decimal('longitude', 11, 8)->nullable()->index();
            $table->text('description')->nullable();
            $table->string('operating_hours', 100)->nullable();
            $table->decimal('average_price', 15, 2)->nullable();
            $table->text('signature_menu')->nullable();
            $table->json('facilities')->nullable();
            $table->boolean('has_wifi')->default(false);
            $table->boolean('has_parking')->default(false);
            $table->string('featured_image')->nullable();
            $table->text('google_maps_url')->nullable();
            $table->string('contact')->nullable();
            $table->string('instagram')->nullable();
            $table->decimal('rating', 3, 2)->nullable();
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
        Schema::dropIfExists('cafes');
    }
};
