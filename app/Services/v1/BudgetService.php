<?php

namespace App\Services\v1;

use App\Models\Budget;
use App\Repositories\v1\interfaces\BudgetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BudgetService
{
    public function __construct(private readonly BudgetRepositoryInterface $budgetRepository)
    {
    }

    public function getAllBudgets(): Collection
    {
        return $this->budgetRepository->getAll();
    }

    public function getBudgetById(int $id): ?Budget
    {
        return $this->budgetRepository->findById($id);
    }

    public function createBudget(array $data): Budget
    {
        return $this->budgetRepository->create($data);
    }

    public function updateBudget(int $id, array $data): ?Budget
    {
        return $this->budgetRepository->update($id, $data);
    }

    public function deleteBudget(int $id): void
    {
        $this->budgetRepository->delete($id);
    }
}
