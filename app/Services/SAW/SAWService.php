<?php

namespace App\Services\SAW;

use App\Models\Beach;

class SAWService
{
    // Default weights based on proposal
    private array $weights = [
        'C1' => 0.25, // Kebersihan (Benefit)
        'C2' => 0.20, // Fasilitas (Benefit)
        'C3' => 0.20, // Aksesibilitas (Benefit)
        'C4' => 0.25, // Keindahan (Benefit)
        'C5' => 0.10, // Biaya (Cost)
    ];

    // Criteria types
    private array $criteriaTypes = [
        'C1' => 'benefit',
        'C2' => 'benefit',
        'C3' => 'benefit',
        'C4' => 'benefit',
        'C5' => 'cost',
    ];

    /**
     * Calculate SAW ranking for active beaches
     */
    public function calculate(): array
    {
        // Validate weights sum to 1.0
        $totalWeight = array_sum($this->weights);
        if (abs($totalWeight - 1.0) > 0.0001) {
            throw new \Exception('Total weights must equal 1.0. Current total: ' . $totalWeight);
        }

        // Get active beaches
        $beaches = Beach::where('is_active', true)
            ->whereNotNull('cleanliness')
            ->whereNotNull('facility_score')
            ->whereNotNull('accessibility')
            ->whereNotNull('beauty')
            ->whereNotNull('ticket_price')
            ->get();

        if ($beaches->isEmpty()) {
            throw new \Exception('No active beaches with complete SAW criteria data found.');
        }

        // Build decision matrix
        $decisionMatrix = $this->buildDecisionMatrix($beaches);

        // Calculate max/min for each criterion
        $extremes = $this->calculateExtremes($decisionMatrix);

        // Normalize matrix
        $normalizedMatrix = $this->normalizeMatrix($decisionMatrix, $extremes);

        // Calculate weighted matrix
        $weightedMatrix = $this->calculateWeightedMatrix($normalizedMatrix);

        // Calculate final scores
        $finalScores = $this->calculateFinalScores($weightedMatrix);

        // Sort by score descending
        arsort($finalScores);

        // Build ranking
        $ranking = [];
        $rank = 1;
        foreach ($finalScores as $beachId => $score) {
            $beach = $beaches->firstWhere('id', $beachId);
            $ranking[] = [
                'rank' => $rank++,
                'beach' => $beach,
                'score' => round($score, 4),
                'weighted_values' => $weightedMatrix[$beachId],
                'normalized_values' => $normalizedMatrix[$beachId],
                'original_values' => $decisionMatrix[$beachId],
            ];
        }

        return [
            'weights' => $this->weights,
            'criteria_types' => $this->criteriaTypes,
            'decision_matrix' => $decisionMatrix,
            'extremes' => $extremes,
            'normalized_matrix' => $normalizedMatrix,
            'weighted_matrix' => $weightedMatrix,
            'final_scores' => $finalScores,
            'ranking' => $ranking,
        ];
    }

    /**
     * Build decision matrix from beach data
     */
    private function buildDecisionMatrix($beaches): array
    {
        $matrix = [];
        foreach ($beaches as $beach) {
            $matrix[$beach->id] = [
                'C1' => $beach->cleanliness,
                'C2' => $beach->facility_score,
                'C3' => $beach->accessibility,
                'C4' => $beach->beauty,
                'C5' => $beach->ticket_price,
            ];
        }
        return $matrix;
    }

    /**
     * Calculate max/min values for each criterion
     */
    private function calculateExtremes(array $matrix): array
    {
        $extremes = [];
        foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $criterion) {
            $values = array_column($matrix, $criterion);
            $extremes[$criterion] = [
                'max' => max($values),
                'min' => min($values),
            ];
        }
        return $extremes;
    }

    /**
     * Normalize matrix using SAW formulas
     * Benefit: rij = xij / max(xij)
     * Cost: rij = min(xij) / xij
     */
    private function normalizeMatrix(array $matrix, array $extremes): array
    {
        $normalized = [];
        foreach ($matrix as $beachId => $values) {
            $normalized[$beachId] = [];
            foreach ($values as $criterion => $value) {
                if ($this->criteriaTypes[$criterion] === 'benefit') {
                    // Benefit: rij = xij / max(xij)
                    $normalized[$beachId][$criterion] = $value / $extremes[$criterion]['max'];
                } else {
                    // Cost: rij = min(xij) / xij
                    if ($value == 0) {
                        throw new \Exception("Zero value found for cost criterion {$criterion}. Cannot divide by zero.");
                    }
                    $normalized[$beachId][$criterion] = $extremes[$criterion]['min'] / $value;
                }
            }
        }
        return $normalized;
    }

    /**
     * Calculate weighted matrix
     * weighted_value = normalized_value * weight
     */
    private function calculateWeightedMatrix(array $normalizedMatrix): array
    {
        $weighted = [];
        foreach ($normalizedMatrix as $beachId => $values) {
            $weighted[$beachId] = [];
            foreach ($values as $criterion => $normalizedValue) {
                $weighted[$beachId][$criterion] = $normalizedValue * $this->weights[$criterion];
            }
        }
        return $weighted;
    }

    /**
     * Calculate final scores
     * Vi = Σ(wj × rij)
     */
    private function calculateFinalScores(array $weightedMatrix): array
    {
        $scores = [];
        foreach ($weightedMatrix as $beachId => $values) {
            $scores[$beachId] = array_sum($values);
        }
        return $scores;
    }

    /**
     * Update weights (for future dynamic weight feature)
     */
    public function setWeights(array $weights): void
    {
        $total = array_sum($weights);
        if (abs($total - 1.0) > 0.0001) {
            throw new \Exception('Total weights must equal 1.0. Current total: ' . $total);
        }
        $this->weights = $weights;
    }

    /**
     * Get current weights
     */
    public function getWeights(): array
    {
        return $this->weights;
    }
}
