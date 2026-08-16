<div class="space-y-6">
    <h1 class="text-2xl font-bold">Cafe Management</h1>

    <!-- Search and Actions -->
    <div class="flex items-center justify-between gap-4">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Search cafes..."
            class="max-w-md px-4 py-2 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
        />

        <a href="{{ route('admin.cafes.create') }}" wire:navigate
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Cafe
        </a>
    </div>

    <!-- Cafes Table -->
    <div class="overflow-x-auto rounded-lg border border-zinc-200 dark:border-zinc-700">
        <table class="w-full">
            <thead class="bg-zinc-50 dark:bg-zinc-800">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Name</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Location</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Hours</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Price</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Rating</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                @forelse($cafes as $cafe)
                    <tr class="{{ $cafe->trashed() ? 'opacity-50' : '' }} hover:bg-zinc-50 dark:hover:bg-zinc-800">
                        <td class="px-4 py-3">
                            <div>
                                <div class="font-medium text-zinc-900 dark:text-zinc-100">{{ $cafe->name }}</div>
                                <div class="text-sm text-zinc-500">{{ $cafe->slug }}</div>
                            </div>
                        </td>

                        <td class="px-4 py-3">
                            <div class="text-sm text-zinc-700 dark:text-zinc-300">{{ $cafe->address ?? '-' }}</div>
                            @if($cafe->latitude && $cafe->longitude)
                                <div class="text-xs text-zinc-500">
                                    {{ $cafe->latitude }}, {{ $cafe->longitude }}
                                </div>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            <span class="text-sm text-zinc-700 dark:text-zinc-300">{{ $cafe->operating_hours ?? '-' }}</span>
                        </td>

                        <td class="px-4 py-3">
                            @if($cafe->average_price)
                                <span class="text-sm text-zinc-700 dark:text-zinc-300">
                                    Rp {{ number_format($cafe->average_price, 0) }}
                                </span>
                            @else
                                <span class="text-sm text-zinc-500">-</span>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            @if($cafe->rating)
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                    {{ $cafe->rating }}/5
                                </span>
                            @else
                                <span class="text-sm text-zinc-500">-</span>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            @if($cafe->trashed())
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                    Deleted
                                </span>
                            @elseif($cafe->is_active)
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.cafes.edit', $cafe) }}" wire:navigate
                                   class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>

                                @if($cafe->is_active)
                                    <button wire:click="toggleActive({{ $cafe->id }})" class="text-zinc-600 hover:text-zinc-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                        </svg>
                                    </button>
                                @else
                                    <button wire:click="toggleActive({{ $cafe->id }})" class="text-zinc-600 hover:text-zinc-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                @endif

                                @if($cafe->trashed())
                                    <button wire:click="restore({{ $cafe->id }})" class="text-green-600 hover:text-green-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                    </button>
                                @else
                                    <button wire:click="delete({{ $cafe->id }})" class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center">
                            <div class="text-zinc-500">No cafes found</div>
                            <div class="text-sm text-zinc-400">Get started by creating a new cafe.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $cafes->links() }}
    </div>
</div>
