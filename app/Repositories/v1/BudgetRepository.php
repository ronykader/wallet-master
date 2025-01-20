<?php

namespace App\Repositories\v1;

use App\Models\Budget;
use App\Repositories\v1\interfaces\BudgetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BudgetRepository implements BudgetRepositoryInterface
{
    /**
    * Get all budgets.
    */
    public function getAll(): Collection
    {
        return Budget::all();
    }

    /**
     * Find a budget by ID.
     */
    public function findById(int $id): ?Budget
    {
        return Budget::find($id);
    }

    /**
     * Create a new budget.
     */
    public function create(array $data): Budget
    {
        return Budget::create($data);
    }

    /**
     * Update a budget by ID.
     */
    public function update(int $id, array $data): ?Budget
    {
        $budget = $this->findById($id);
        if ($budget) {
            $budget->update($data);
        }
        return $budget;
    }

    /**
     * Delete a budget by ID.
     */
    public function delete(int $id): void
    {
        $budget = $this->findById($id);
        if ($budget) {
            $budget->delete();
        }
    }
}
