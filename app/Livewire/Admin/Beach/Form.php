<?php

namespace App\Livewire\Admin\Beach;

use App\Models\Beach;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Beach Form')]
class Form extends Component
{
    public ?Beach $beach = null;

    public string $name = '';
    public string $slug = '';
    public ?string $address = null;
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?string $description = null;
    public ?string $operating_hours = null;
    public ?float $ticket_price = null;
    public ?float $ticket_price_min = null;
    public ?float $ticket_price_max = null;
    public ?array $facilities = null;
    public ?string $featured_image = null;
    public ?string $video = null;
    public ?string $google_maps_url = null;
    public ?string $contact = null;
    public ?float $rating = null;

    // SAW Criteria
    public int $cleanliness = 1;
    public int $facility_score = 1;
    public int $accessibility = 1;
    public int $beauty = 1;

    public bool $is_active = true;

    public function mount(?Beach $beach = null)
    {
        if ($beach) {
            $this->beach = $beach;
            $this->name = $beach->name;
            $this->slug = $beach->slug;
            $this->address = $beach->address;
            $this->latitude = $beach->latitude;
            $this->longitude = $beach->longitude;
            $this->description = $beach->description;
            $this->operating_hours = $beach->operating_hours;
            $this->ticket_price = $beach->ticket_price;
            $this->ticket_price_min = $beach->ticket_price_min;
            $this->ticket_price_max = $beach->ticket_price_max;
            $this->facilities = $beach->facilities;
            $this->featured_image = $beach->featured_image;
            $this->video = $beach->video;
            $this->google_maps_url = $beach->google_maps_url;
            $this->contact = $beach->contact;
            $this->rating = $beach->rating;
            $this->cleanliness = $beach->cleanliness;
            $this->facility_score = $beach->facility_score;
            $this->accessibility = $beach->accessibility;
            $this->beauty = $beach->beauty;
            $this->is_active = $beach->is_active;
        }
    }

    public function updatedName($value)
    {
        // Auto-generate slug from name only during create mode
        if (!$this->beach) {
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
            'ticket_price' => $this->ticket_price,
            'ticket_price_min' => $this->ticket_price_min,
            'ticket_price_max' => $this->ticket_price_max,
            'facilities' => $this->facilities,
            'featured_image' => $this->featured_image,
            'video' => $this->video,
            'google_maps_url' => $this->google_maps_url,
            'contact' => $this->contact,
            'rating' => $this->rating,
            'cleanliness' => $this->cleanliness,
            'facility_score' => $this->facility_score,
            'accessibility' => $this->accessibility,
            'beauty' => $this->beauty,
            'is_active' => $this->is_active,
        ];

        if ($this->beach) {
            $this->beach->update($data);
            $this->dispatch('toast', 'Beach updated successfully', 'success');
        } else {
            Beach::create($data);
            $this->dispatch('toast', 'Beach created successfully', 'success');
        }

        return redirect()->route('admin.beaches.index');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:beaches,slug,' . ($this->beach?->id ?? 'NULL'),
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'description' => 'nullable|string',
            'operating_hours' => 'nullable|string|max:100',
            'ticket_price' => 'nullable|numeric|min:0',
            'ticket_price_min' => 'nullable|numeric|min:0',
            'ticket_price_max' => 'nullable|numeric|min:0',
            'facilities' => 'nullable|array',
            'featured_image' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'google_maps_url' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|between:0,5',
            'cleanliness' => 'required|integer|between:1,5',
            'facility_score' => 'required|integer|between:1,5',
            'accessibility' => 'required|integer|between:1,5',
            'beauty' => 'required|integer|between:1,5',
            'is_active' => 'boolean',
        ];
    }

    public function render()
    {
        return view('livewire.admin.beach.form');
    }
}
