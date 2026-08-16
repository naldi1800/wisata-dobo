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
        Schema::create('beaches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable()->index();
            $table->decimal('longitude', 11, 8)->nullable()->index();
            $table->text('description')->nullable();
            $table->string('operating_hours', 100)->nullable();
            $table->decimal('ticket_price', 15, 2)->nullable();
            $table->decimal('ticket_price_min', 15, 2)->nullable();
            $table->decimal('ticket_price_max', 15, 2)->nullable();
            $table->json('facilities')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('video')->nullable();
            $table->text('google_maps_url')->nullable();
            $table->string('contact')->nullable();
            $table->decimal('rating', 3, 2)->nullable();
            
            // SAW Criteria
            $table->tinyInteger('cleanliness')->default(0);
            $table->tinyInteger('facility_score')->default(0);
            $table->tinyInteger('accessibility')->default(0);
            $table->tinyInteger('beauty')->default(0);
            
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
        Schema::dropIfExists('beaches');
    }
};
