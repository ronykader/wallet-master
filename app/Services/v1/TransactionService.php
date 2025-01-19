<?php

namespace App\Services\v1;

use App\Models\Category;
use App\Models\Transaction;
use App\Repositories\v1\interfaces\CategoryRepositoryInterface;
use App\Repositories\v1\interfaces\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TransactionService
{
    public function __construct(private readonly TransactionRepositoryInterface $transactionRepository)
    {
    }

    public function getAllTransactions(): Collection
    {
        return $this->transactionRepository->getAll();
    }

    public function getTransactionById(int $id): ?Transaction
    {
        return $this->transactionRepository->findById($id);
    }

    public function createTransaction(array $data): Transaction
    {
        return $this->transactionRepository->create($data);
    }

    public function updateTransaction(int $id, array $data): ?Transaction
    {
        return $this->transactionRepository->update($id, $data);
    }

    public function deleteTransaction(int $id): void
    {
        $this->transactionRepository->delete($id);
    }
}
