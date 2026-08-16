<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cafe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'latitude',
        'longitude',
        'description',
        'operating_hours',
        'average_price',
        'signature_menu',
        'facilities',
        'has_wifi',
        'has_parking',
        'featured_image',
        'google_maps_url',
        'contact',
        'instagram',
        'rating',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:8',
            'longitude' => 'decimal:8',
            'average_price' => 'decimal:2',
            'facilities' => 'array',
            'has_wifi' => 'boolean',
            'has_parking' => 'boolean',
            'rating' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }
}
