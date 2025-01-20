<?php

namespace App\Repositories\v1\interfaces;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Collection;

interface BudgetRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Budget;

    public function create(array $data): Budget;

    public function update(int $id, array $data): ?Budget;

    public function delete(int $id): void;
}
