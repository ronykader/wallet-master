<?php

namespace App\Repositories\v1;

use App\Models\Account;
use App\Repositories\v1\interfaces\AccountRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AccountRepository implements AccountRepositoryInterface
{
    /**
    * Get all accounts.
    */
    public function getAll(): Collection
    {
        return Account::all();
    }

    /**
     * Find a account by ID.
     */
    public function findById(int $id): ?Account
    {
        return Account::find($id);
    }

    /**
     * Create a new account.
     */
    public function create(array $data): Account
    {
        return Account::create($data);
    }

    /**
     * Update a account by ID.
     */
    public function update(int $id, array $data): ?Account
    {
        $account = $this->findById($id);
        if ($account) {
            $account->update($data);
        }
        return $account;
    }

    /**
     * Delete a account by ID.
     */
    public function delete(int $id): void
    {
        $account = $this->findById($id);
        if ($account) {
            $account->delete();
        }
    }
}
