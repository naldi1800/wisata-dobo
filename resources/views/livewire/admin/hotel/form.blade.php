<div class="space-y-6">
    <h1 class="text-2xl font-bold">
        {{ $hotel ? 'Edit Hotel' : 'Create Hotel' }}
    </h1>

    <form wire:submit="save">
        <div class="space-y-8">
            <!-- Hotel Information -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Hotel Information</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Name *</label>
                        <input
                            wire:model="name"
                            type="text"
                            placeholder="Enter hotel name"
                            required
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Slug *</label>
                        <input
                            wire:model="slug"
                            type="text"
                            placeholder="hotel-slug"
                            required
                            {{ $hotel ? 'readonly' : '' }}
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800 {{ $hotel ? 'bg-zinc-100 dark:bg-zinc-700' : '' }}"
                        />
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if(!$hotel)
                            <p class="mt-1 text-xs text-zinc-500">Auto-generated from name</p>
                        @endif
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Address</label>
                        <textarea
                            wire:model="address"
                            placeholder="Enter address"
                            rows="3"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        ></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Latitude</label>
                        <input
                            wire:model="latitude"
                            type="number"
                            step="any"
                            placeholder="-5.7735"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('latitude')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Longitude</label>
                        <input
                            wire:model="longitude"
                            type="number"
                            step="any"
                            placeholder="134.2128"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('longitude')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Description</label>
                        <textarea
                            wire:model="description"
                            placeholder="Enter description"
                            rows="4"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Hotel Details -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Hotel Details</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Hotel Class</label>
                        <input
                            wire:model="hotel_class"
                            type="text"
                            placeholder="Melati / Hotel Lokal"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('hotel_class')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Room Count</label>
                        <input
                            wire:model="room_count"
                            type="number"
                            min="0"
                            placeholder="25"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('room_count')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Check-in Time</label>
                        <input
                            wire:model="check_in_time"
                            type="text"
                            placeholder="14.00 WIT"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Check-out Time</label>
                        <input
                            wire:model="check_out_time"
                            type="text"
                            placeholder="12.00 WIT"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Price Start</label>
                        <input
                            wire:model="price_start"
                            type="number"
                            step="0.01"
                            min="0"
                            placeholder="400000"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('price_start')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Rating</label>
                        <input
                            wire:model="rating"
                            type="number"
                            step="0.01"
                            min="0"
                            placeholder="9.4"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Facilities -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Facilities</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Facilities</label>
                        <textarea
                            wire:model="facilities"
                            placeholder="Enter facilities (comma separated)"
                            rows="3"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        ></textarea>
                        <p class="mt-1 text-xs text-zinc-500">Separate multiple facilities with commas</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <input
                            wire:model="has_parking"
                            type="checkbox"
                            id="has_parking"
                            class="w-5 h-5 border-zinc-300 rounded focus:ring-blue-500"
                        />
                        <label for="has_parking" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Has Parking
                        </label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input
                            wire:model="has_pool"
                            type="checkbox"
                            id="has_pool"
                            class="w-5 h-5 border-zinc-300 rounded focus:ring-blue-500"
                        />
                        <label for="has_pool" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Has Pool
                        </label>
                    </div>
                </div>
            </div>

            <!-- Contact & Media -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Contact & Media</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Contact</label>
                        <input
                            wire:model="contact"
                            type="text"
                            placeholder="Contact information"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Website</label>
                        <input
                            wire:model="website"
                            type="text"
                            placeholder="https://..."
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Featured Image</label>
                        <input
                            wire:model="image"
                            type="file"
                            accept="image/*"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        
                        {{-- Image Preview --}}
                        @if($image)
                            <div class="mt-2">
                                <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="h-48 w-full object-cover rounded-lg" />
                            </div>
                        @elseif($hotel && $hotel->featured_image)
                            <div class="mt-2">
                                <img src="{{ asset('assets/images/hotels/' . $hotel->featured_image) }}" alt="Current Image" class="h-48 w-full object-cover rounded-lg" />
                            </div>
                        @else
                            <div class="mt-2">
                                <div class="h-48 w-full bg-zinc-200 dark:bg-zinc-700 rounded-lg flex items-center justify-center">
                                    <span class="text-zinc-500 dark:text-zinc-400">No image</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Video</label>
                        <input
                            wire:model="video"
                            type="text"
                            placeholder="Video URL"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Google Maps URL</label>
                        <input
                            wire:model="google_maps_url"
                            type="text"
                            placeholder="https://maps.app.goo.gl/..."
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Status</h2>
                
                <div class="flex items-center gap-3">
                    <input
                        wire:model="is_active"
                        type="checkbox"
                        id="is_active"
                        class="w-5 h-5 border-zinc-300 rounded focus:ring-blue-500"
                    />
                    <label for="is_active" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                        Active
                    </label>
                </div>
                <p class="text-xs text-zinc-500">Inactive hotels will not be displayed on public pages</p>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.hotels.index') }}" wire:navigate
                   class="px-4 py-2 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">
                    Cancel
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    {{ $hotel ? 'Update Hotel' : 'Create Hotel' }}
                </button>
            </div>
        </div>
    </form>
</div>
