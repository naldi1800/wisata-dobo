<?php

namespace App\Livewire\Admin\Hotel;

use App\Models\Hotel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Hotel Form')]
class Form extends Component
{
    public ?Hotel $hotel = null;

    public string $name = '';
    public string $slug = '';
    public ?string $address = null;
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?string $description = null;
    public ?string $hotel_class = null;
    public ?string $check_in_time = null;
    public ?string $check_out_time = null;
    public ?float $price_start = null;
    public ?int $room_count = null;
    public ?array $facilities = null;
    public bool $has_parking = false;
    public bool $has_pool = false;
    public ?string $featured_image = null;
    public ?string $video = null;
    public ?string $google_maps_url = null;
    public ?string $contact = null;
    public ?string $website = null;
    public ?float $rating = null;
    public bool $is_active = true;

    public function mount(?Hotel $hotel = null)
    {
        if ($hotel) {
            $this->hotel = $hotel;
            $this->name = $hotel->name;
            $this->slug = $hotel->slug;
            $this->address = $hotel->address;
            $this->latitude = $hotel->latitude;
            $this->longitude = $hotel->longitude;
            $this->description = $hotel->description;
            $this->hotel_class = $hotel->hotel_class;
            $this->check_in_time = $hotel->check_in_time;
            $this->check_out_time = $hotel->check_out_time;
            $this->price_start = $hotel->price_start;
            $this->room_count = $hotel->room_count;
            $this->facilities = $hotel->facilities;
            $this->has_parking = $hotel->has_parking;
            $this->has_pool = $hotel->has_pool;
            $this->featured_image = $hotel->featured_image;
            $this->video = $hotel->video;
            $this->google_maps_url = $hotel->google_maps_url;
            $this->contact = $hotel->contact;
            $this->website = $hotel->website;
            $this->rating = $hotel->rating;
            $this->is_active = $hotel->is_active;
        }
    }

    public function updatedName($value)
    {
        // Auto-generate slug from name only during create mode
        if (!$this->hotel) {
            $this->slug = \Illuminate\Support\Str::slug($value);
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'description' => $this->description,
            'hotel_class' => $this->hotel_class,
            'check_in_time' => $this->check_in_time,
            'check_out_time' => $this->check_out_time,
            'price_start' => $this->price_start,
            'room_count' => $this->room_count,
            'facilities' => $this->facilities,
            'has_parking' => $this->has_parking,
            'has_pool' => $this->has_pool,
            'featured_image' => $this->featured_image,
            'video' => $this->video,
            'google_maps_url' => $this->google_maps_url,
            'contact' => $this->contact,
            'website' => $this->website,
            'rating' => $this->rating,
            'is_active' => $this->is_active,
        ];

        if ($this->hotel) {
            $this->hotel->update($data);
            $this->dispatch('toast', 'Hotel updated successfully', 'success');
        } else {
            Hotel::create($data);
            $this->dispatch('toast', 'Hotel created successfully', 'success');
        }

        return redirect()->route('admin.hotels.index');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:hotels,slug,' . ($this->hotel?->id ?? 'NULL'),
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'description' => 'nullable|string',
            'hotel_class' => 'nullable|string|max:50',
            'check_in_time' => 'nullable|string|max:50',
            'check_out_time' => 'nullable|string|max:50',
            'price_start' => 'nullable|numeric|min:0',
            'room_count' => 'nullable|integer|min:0',
            'facilities' => 'nullable|array',
            'has_parking' => 'boolean',
            'has_pool' => 'boolean',
            'featured_image' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'google_maps_url' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ];
    }

    public function render()
    {
        return view('livewire.admin.hotel.form');
    }
}
