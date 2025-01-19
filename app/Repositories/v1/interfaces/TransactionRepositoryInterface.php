<?php

namespace App\Repositories\v1\interfaces;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

interface TransactionRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Transaction;

    public function create(array $data): Transaction;

    public function update(int $id, array $data): ?Transaction;

    public function delete(int $id): void;
}
