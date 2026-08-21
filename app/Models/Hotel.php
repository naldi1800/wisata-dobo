<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'latitude',
        'longitude',
        'description',
        'hotel_class',
        'check_in_time',
        'check_out_time',
        'price_start',
        'room_count',
        'facilities',
        'has_parking',
        'has_pool',
        'featured_image',
        'video',
        'google_maps_url',
        'contact',
        'website',
        'rating',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:8',
            'longitude' => 'decimal:8',
            'price_start' => 'decimal:2',
            'room_count' => 'integer',
            'facilities' => 'array',
            'has_parking' => 'boolean',
            'has_pool' => 'boolean',
            'rating' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::forceDeleted(function ($hotel) {
            // Delete image file when permanently deleted
            if ($hotel->featured_image) {
                $imagePath = public_path('assets/images/hotels/' . $hotel->featured_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        });
    }
}
