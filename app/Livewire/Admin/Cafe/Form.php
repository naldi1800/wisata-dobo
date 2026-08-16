<?php

namespace App\Livewire\Admin\Cafe;

use App\Models\Cafe;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Cafe Form')]
class Form extends Component
{
    public ?Cafe $cafe = null;

    public string $name = '';
    public string $slug = '';
    public ?string $address = null;
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?string $description = null;
    public ?string $operating_hours = null;
    public ?float $average_price = null;
    public ?string $signature_menu = null;
    public ?array $facilities = null;
    public bool $has_wifi = false;
    public bool $has_parking = false;
    public ?string $featured_image = null;
    public ?string $google_maps_url = null;
    public ?string $contact = null;
    public ?string $instagram = null;
    public ?float $rating = null;
    public bool $is_active = true;

    public function mount(?Cafe $cafe = null)
    {
        if ($cafe) {
            $this->cafe = $cafe;
            $this->name = $cafe->name;
            $this->slug = $cafe->slug;
            $this->address = $cafe->address;
            $this->latitude = $cafe->latitude;
            $this->longitude = $cafe->longitude;
            $this->description = $cafe->description;
            $this->operating_hours = $cafe->operating_hours;
            $this->average_price = $cafe->average_price;
            $this->signature_menu = $cafe->signature_menu;
            $this->facilities = $cafe->facilities;
            $this->has_wifi = $cafe->has_wifi;
            $this->has_parking = $cafe->has_parking;
            $this->featured_image = $cafe->featured_image;
            $this->google_maps_url = $cafe->google_maps_url;
            $this->contact = $cafe->contact;
            $this->instagram = $cafe->instagram;
            $this->rating = $cafe->rating;
            $this->is_active = $cafe->is_active;
        }
    }

    public function updatedName($value)
    {
        // Auto-generate slug from name only during create mode
        if (!$this->cafe) {
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
            'operating_hours' => $this->operating_hours,
            'average_price' => $this->average_price,
            'signature_menu' => $this->signature_menu,
            'facilities' => $this->facilities,
            'has_wifi' => $this->has_wifi,
            'has_parking' => $this->has_parking,
            'featured_image' => $this->featured_image,
            'google_maps_url' => $this->google_maps_url,
            'contact' => $this->contact,
            'instagram' => $this->instagram,
            'rating' => $this->rating,
            'is_active' => $this->is_active,
        ];

        if ($this->cafe) {
            $this->cafe->update($data);
            $this->dispatch('toast', 'Cafe updated successfully', 'success');
        } else {
            Cafe::create($data);
            $this->dispatch('toast', 'Cafe created successfully', 'success');
        }

        return redirect()->route('admin.cafes.index');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cafes,slug,' . ($this->cafe?->id ?? 'NULL'),
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'description' => 'nullable|string',
            'operating_hours' => 'nullable|string|max:100',
            'average_price' => 'nullable|numeric|min:0',
            'signature_menu' => 'nullable|string',
            'facilities' => 'nullable|array',
            'has_wifi' => 'boolean',
            'has_parking' => 'boolean',
            'featured_image' => 'nullable|string|max:255',
            'google_maps_url' => 'nullable|string|max:1000',
            'contact' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|between:0,5',
            'is_active' => 'boolean',
        ];
    }

    public function render()
    {
        return view('livewire.admin.cafe.form');
    }
}
