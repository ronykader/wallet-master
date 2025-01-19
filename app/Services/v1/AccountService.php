<?php

namespace App\Services\v1;

use App\Models\Account;
use App\Repositories\v1\interfaces\AccountRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AccountService
{
    public function __construct(private readonly AccountRepositoryInterface $accountRepository)
    {
    }

    public function getAllAccounts(): Collection
    {
        return $this->accountRepository->getAll();
    }

    public function getAccountById(int $id): ?Account
    {
        return $this->accountRepository->findById($id);
    }

    public function createAccount(array $data): Account
    {
        return $this->accountRepository->create($data);
    }

    public function updateAccount(int $id, array $data): ?Account
    {
        return $this->accountRepository->update($id, $data);
    }

    public function deleteAccount(int $id): void
    {
        $this->accountRepository->delete($id);
    }
}
