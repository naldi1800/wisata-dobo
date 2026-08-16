<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beach extends Model
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
        'ticket_price',
        'ticket_price_min',
        'ticket_price_max',
        'facilities',
        'featured_image',
        'video',
        'google_maps_url',
        'contact',
        'rating',
        'cleanliness',
        'facility_score',
        'accessibility',
        'beauty',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:8',
            'longitude' => 'decimal:8',
            'ticket_price' => 'decimal:2',
            'ticket_price_min' => 'decimal:2',
            'ticket_price_max' => 'decimal:2',
            'facilities' => 'array',
            'rating' => 'decimal:2',
            'cleanliness' => 'integer',
            'facility_score' => 'integer',
            'accessibility' => 'integer',
            'beauty' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
