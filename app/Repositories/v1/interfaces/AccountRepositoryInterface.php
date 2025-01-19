<?php

namespace App\Repositories\v1\interfaces;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

interface AccountRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Account;

    public function create(array $data): Account;

    public function update(int $id, array $data): ?Account;

    public function delete(int $id): void;
}
