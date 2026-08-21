<div class="space-y-6">
    <h1 class="text-2xl font-bold">
        {{ $beach ? 'Edit Beach' : 'Create Beach' }}
    </h1>

    <form wire:submit="save">
        <div class="space-y-8">
            <!-- Beach Information -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Beach Information</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Name *</label>
                        <input
                            wire:model="name"
                            type="text"
                            placeholder="Enter beach name"
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
                            placeholder="beach-slug"
                            required
                            {{ $beach ? 'readonly' : '' }}
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800 {{ $beach ? 'bg-zinc-100 dark:bg-zinc-700' : '' }}"
                        />
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if(!$beach)
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
                            placeholder="-6.103"
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
                            placeholder="134.487"
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

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Operating Hours</label>
                        <input
                            wire:model="operating_hours"
                            type="text"
                            placeholder="24 Jam"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Contact</label>
                        <input
                            wire:model="contact"
                            type="text"
                            placeholder="Contact information"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Pricing</h2>
                
                <div class="grid gap-6 md:grid-cols-3">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Ticket Price (C5 SAW)</label>
                        <input
                            wire:model="ticket_price"
                            type="number"
                            step="0.01"
                            placeholder="10000"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        <p class="mt-1 text-xs text-zinc-500">Used as Cost criterion in SAW calculation</p>
                        @error('ticket_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Price Min</label>
                        <input
                            wire:model="ticket_price_min"
                            type="number"
                            step="0.01"
                            placeholder="20000"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('ticket_price_min')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Price Max</label>
                        <input
                            wire:model="ticket_price_max"
                            type="number"
                            step="0.01"
                            placeholder="500000"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('ticket_price_max')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- SAW Criteria -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">SAW Criteria (Benefit: 1-5)</h2>
                
                <div class="grid gap-6 md:grid-cols-4">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">C1: Kebersihan *</label>
                        <input
                            wire:model="cleanliness"
                            type="number"
                            min="1"
                            max="5"
                            required
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('cleanliness')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">C2: Fasilitas *</label>
                        <input
                            wire:model="facility_score"
                            type="number"
                            min="1"
                            max="5"
                            required
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('facility_score')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">C3: Aksesibilitas *</label>
                        <input
                            wire:model="accessibility"
                            type="number"
                            min="1"
                            max="5"
                            required
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('accessibility')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">C4: Keindahan *</label>
                        <input
                            wire:model="beauty"
                            type="number"
                            min="1"
                            max="5"
                            required
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('beauty')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                    <h3 class="font-medium text-blue-900 dark:text-blue-100">SAW Criteria Info</h3>
                    <p class="text-sm text-blue-700 dark:text-blue-300 mt-1">
                        C1-C4 are Benefit criteria (higher is better). C5 (Ticket Price) is Cost criterion (lower is better).
                    </p>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Additional Information</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Rating</label>
                        <input
                            wire:model="rating"
                            type="number"
                            step="0.01"
                            min="0"
                            max="5"
                            placeholder="4.5"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
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
                        @elseif($beach && $beach->featured_image)
                            <div class="mt-2">
                                <img src="{{ asset('assets/images/beaches/' . $beach->featured_image) }}" alt="Current Image" class="h-48 w-full object-cover rounded-lg" />
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

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Google Maps URL</label>
                        <input
                            wire:model="google_maps_url"
                            type="text"
                            placeholder="https://maps.app.goo.gl/..."
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>

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
                <p class="text-xs text-zinc-500">Inactive beaches will not be displayed on public pages</p>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.beaches.index') }}" wire:navigate
                   class="px-4 py-2 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">
                    Cancel
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    {{ $beach ? 'Update Beach' : 'Create Beach' }}
                </button>
            </div>
        </div>
    </form>
</div>
