<?php

namespace App\Repositories\v1\interfaces;

use App\Models\FamilyMember;
use Illuminate\Database\Eloquent\Collection;

interface FamilyMemberRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?FamilyMember;

    public function create(array $data): FamilyMember;

    public function update(int $id, array $data): ?FamilyMember;

    public function delete(int $id): void;
}
