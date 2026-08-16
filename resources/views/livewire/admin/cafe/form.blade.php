<div class="space-y-6">
    <h1 class="text-2xl font-bold">
        {{ $cafe ? 'Edit Cafe' : 'Create Cafe' }}
    </h1>

    <form wire:submit="save">
        <div class="space-y-8">
            <!-- Cafe Information -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Cafe Information</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Name *</label>
                        <input
                            wire:model="name"
                            type="text"
                            placeholder="Enter cafe name"
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
                            placeholder="cafe-slug"
                            required
                            {{ $cafe ? 'readonly' : '' }}
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800 {{ $cafe ? 'bg-zinc-100 dark:bg-zinc-700' : '' }}"
                        />
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if(!$cafe)
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
                            placeholder="-5.7742"
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
                            placeholder="134.2135"
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
                            placeholder="09.00 - 22.00 WIT"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('operating_hours')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Price & Menu -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Price & Menu</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Average Price</label>
                        <input
                            wire:model="average_price"
                            type="number"
                            step="0.01"
                            min="0"
                            placeholder="35000"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                        @error('average_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Signature Menu</label>
                        <input
                            wire:model="signature_menu"
                            type="text"
                            placeholder="Kopi Susu Gospel, Nasi Goreng Seafood"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
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
                            wire:model="has_wifi"
                            type="checkbox"
                            id="has_wifi"
                            class="w-5 h-5 border-zinc-300 rounded focus:ring-blue-500"
                        />
                        <label for="has_wifi" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Has WiFi
                        </label>
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
                </div>
            </div>

            <!-- Media -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Media</h2>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Featured Image</label>
                        <input
                            wire:model="featured_image"
                            type="text"
                            placeholder="Image URL"
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
                        @error('google_maps_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Contact</h2>
                
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
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Instagram</label>
                        <input
                            wire:model="instagram"
                            type="text"
                            placeholder="@username"
                            class="w-full px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
                        />
                    </div>
                </div>
            </div>

            <!-- Rating & Status -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold">Rating & Status</h2>
                
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
                </div>
                <p class="text-xs text-zinc-500">Inactive cafes will not be displayed on public pages</p>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.cafes.index') }}" wire:navigate
                   class="px-4 py-2 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">
                    Cancel
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    {{ $cafe ? 'Update Cafe' : 'Create Cafe' }}
                </button>
            </div>
        </div>
    </form>
</div>
