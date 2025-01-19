<?php

namespace App\Repositories\v1;

use App\Models\Category;
use App\Models\Transaction;
use App\Repositories\v1\interfaces\CategoryRepositoryInterface;
use App\Repositories\v1\interfaces\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository implements TransactionRepositoryInterface
{
    /**
    * Get all transactions.
    */
    public function getAll(): Collection
    {
        return Transaction::all();
    }

    /**
     * Find a transaction by ID.
     */
    public function findById(int $id): ?Transaction
    {
        return Transaction::find($id);
    }

    /**
     * Create a new transaction.
     */
    public function create(array $data): Transaction
    {
        return Transaction::create($data);
    }

    /**
     * Update a transaction by ID.
     */
    public function update(int $id, array $data): ?Transaction
    {
        $transaction = $this->findById($id);
        if ($transaction) {
            $transaction->update($data);
        }
        return $transaction;
    }

    /**
     * Delete a transaction by ID.
     */
    public function delete(int $id): void
    {
        $transaction = $this->findById($id);
        if ($transaction) {
            $transaction->delete();
        }
    }
}
