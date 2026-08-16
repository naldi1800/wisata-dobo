<div class="space-y-6">
    <h1 class="text-2xl font-bold">SAW Beach Recommendations</h1>

    @if($error)
        <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
            <p class="text-red-700 dark:text-red-300">{{ $error }}</p>
        </div>
    @endif

    @if(empty($sawResult))
        <div class="p-8 text-center border border-zinc-200 dark:border-zinc-700 rounded-lg">
            <p class="text-zinc-500">No SAW calculation data available</p>
        </div>
    @else
        <!-- Ranking Table -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Recommendation Ranking</h2>
                <button wire:click="calculateSAW" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                    Recalculate
                </button>
            </div>

            <div class="overflow-x-auto rounded-lg border border-zinc-200 dark:border-zinc-700">
                <table class="w-full">
                    <thead class="bg-zinc-50 dark:bg-zinc-800">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Rank</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Beach</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">C1</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">C2</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">C3</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">C4</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">C5</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-zinc-700 dark:text-zinc-300">Score</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                        @foreach($sawResult['ranking'] as $item)
                            <tr class="{{ $item['rank'] === 1 ? 'bg-green-50 dark:bg-green-900/20' : '' }} hover:bg-zinc-50 dark:hover:bg-zinc-800">
                                <td class="px-4 py-3">
                                    @if($item['rank'] === 1)
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                            #{{ $item['rank'] }}
                                        </span>
                                    @else
                                        <span class="text-sm text-zinc-700 dark:text-zinc-300">#{{ $item['rank'] }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div>
                                        <div class="font-medium text-zinc-900 dark:text-zinc-100">
                                            {{ $item['beach']->name }}
                                            @if($item['rank'] === 1)
                                                <span class="ml-2 inline-flex items-center px-2 py-0.5 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                                    Top
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-sm text-zinc-500">{{ $item['beach']->address }}</div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm text-zinc-700 dark:text-zinc-300">{{ $item['original_values']['C1'] }}</td>
                                <td class="px-4 py-3 text-sm text-zinc-700 dark:text-zinc-300">{{ $item['original_values']['C2'] }}</td>
                                <td class="px-4 py-3 text-sm text-zinc-700 dark:text-zinc-300">{{ $item['original_values']['C3'] }}</td>
                                <td class="px-4 py-3 text-sm text-zinc-700 dark:text-zinc-300">{{ $item['original_values']['C4'] }}</td>
                                <td class="px-4 py-3 text-sm text-zinc-700 dark:text-zinc-300">{{ number_format($item['original_values']['C5'], 0) }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                        {{ $item['score'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Detailed Calculation -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Detailed SAW Calculation</h2>
                <button wire:click="toggleDetails" class="text-blue-600 hover:text-blue-800 text-sm">
                    {{ $showDetails ? 'Hide Details' : 'Show Details' }}
                </button>
            </div>

            @if($showDetails)
                <div class="space-y-6">
                    <!-- Weights -->
                    <div class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <h3 class="font-semibold mb-3">Criteria Weights</h3>
                        <div class="grid grid-cols-5 gap-4 text-sm">
                            @foreach($sawResult['weights'] as $criterion => $weight)
                                <div>
                                    <div class="font-medium">{{ $criterion }}</div>
                                    <div class="text-zinc-600 dark:text-zinc-400">
                                        {{ $weight }} ({{ $sawResult['criteria_types'][$criterion] }})
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-3 text-sm text-zinc-600 dark:text-zinc-400">
                            Total: {{ array_sum($sawResult['weights']) }}
                        </div>
                    </div>

                    <!-- Decision Matrix -->
                    <div class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <h3 class="font-semibold mb-3">Decision Matrix (Original Values)</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                        <th class="px-3 py-2 text-left">Beach</th>
                                        <th class="px-3 py-2 text-left">C1</th>
                                        <th class="px-3 py-2 text-left">C2</th>
                                        <th class="px-3 py-2 text-left">C3</th>
                                        <th class="px-3 py-2 text-left">C4</th>
                                        <th class="px-3 py-2 text-left">C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sawResult['decision_matrix'] as $beachId => $values)
                                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                            <td class="px-3 py-2">{{ $sawResult['ranking'][array_search($beachId, array_column($sawResult['ranking'], 'beach.id'))]['beach']->name }}</td>
                                            <td class="px-3 py-2">{{ $values['C1'] }}</td>
                                            <td class="px-3 py-2">{{ $values['C2'] }}</td>
                                            <td class="px-3 py-2">{{ $values['C3'] }}</td>
                                            <td class="px-3 py-2">{{ $values['C4'] }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C5'], 0) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Max/Min Values -->
                    <div class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <h3 class="font-semibold mb-3">Max/Min Values per Criterion</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                        <th class="px-3 py-2 text-left">Criterion</th>
                                        <th class="px-3 py-2 text-left">Type</th>
                                        <th class="px-3 py-2 text-left">Max</th>
                                        <th class="px-3 py-2 text-left">Min</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sawResult['extremes'] as $criterion => $extreme)
                                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                            <td class="px-3 py-2">{{ $criterion }}</td>
                                            <td class="px-3 py-2">{{ $sawResult['criteria_types'][$criterion] }}</td>
                                            <td class="px-3 py-2">{{ $extreme['max'] }}</td>
                                            <td class="px-3 py-2">{{ $extreme['min'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Normalization Matrix -->
                    <div class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <h3 class="font-semibold mb-3">Normalization Matrix</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                        <th class="px-3 py-2 text-left">Beach</th>
                                        <th class="px-3 py-2 text-left">C1</th>
                                        <th class="px-3 py-2 text-left">C2</th>
                                        <th class="px-3 py-2 text-left">C3</th>
                                        <th class="px-3 py-2 text-left">C4</th>
                                        <th class="px-3 py-2 text-left">C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sawResult['normalized_matrix'] as $beachId => $values)
                                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                            <td class="px-3 py-2">{{ $sawResult['ranking'][array_search($beachId, array_column($sawResult['ranking'], 'beach.id'))]['beach']->name }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C1'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C2'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C3'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C4'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C5'], 4) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Weighted Matrix -->
                    <div class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <h3 class="font-semibold mb-3">Weighted Matrix (Normalized × Weight)</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                        <th class="px-3 py-2 text-left">Beach</th>
                                        <th class="px-3 py-2 text-left">C1</th>
                                        <th class="px-3 py-2 text-left">C2</th>
                                        <th class="px-3 py-2 text-left">C3</th>
                                        <th class="px-3 py-2 text-left">C4</th>
                                        <th class="px-3 py-2 text-left">C5</th>
                                        <th class="px-3 py-2 text-left">Sum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sawResult['weighted_matrix'] as $beachId => $values)
                                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                            <td class="px-3 py-2">{{ $sawResult['ranking'][array_search($beachId, array_column($sawResult['ranking'], 'beach.id'))]['beach']->name }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C1'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C2'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C3'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C4'], 4) }}</td>
                                            <td class="px-3 py-2">{{ number_format($values['C5'], 4) }}</td>
                                            <td class="px-3 py-2 font-semibold">{{ number_format(array_sum($values), 4) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Final Scores -->
                    <div class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <h3 class="font-semibold mb-3">Final Scores</h3>
                        <div class="space-y-2">
                            @foreach($sawResult['final_scores'] as $beachId => $score)
                                <div class="flex justify-between text-sm">
                                    <span>{{ $sawResult['ranking'][array_search($beachId, array_column($sawResult['ranking'], 'beach.id'))]['beach']->name }}</span>
                                    <span class="font-semibold">{{ number_format($score, 4) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
