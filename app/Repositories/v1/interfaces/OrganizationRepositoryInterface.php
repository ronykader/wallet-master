<?php

namespace App\Repositories\v1\interfaces;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Collection;

interface OrganizationRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Organization;

    public function create(array $data): Organization;

    public function update(int $id, array $data): ?Organization;

    public function delete(int $id): void;
}
