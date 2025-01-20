<?php

namespace App\Repositories\v1;

use App\Models\FamilyMember;
use App\Repositories\v1\interfaces\FamilyMemberRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FamilyMemberRepository implements FamilyMemberRepositoryInterface
{
    /**
    * Get all familyMembers.
    */
    public function getAll(): Collection
    {
        return FamilyMember::all();
    }

    /**
     * Find a familyMember by ID.
     */
    public function findById(int $id): ?FamilyMember
    {
        return FamilyMember::find($id);
    }

    /**
     * Create a new familyMember.
     */
    public function create(array $data): FamilyMember
    {
        return FamilyMember::create($data);
    }

    /**
     * Update a familyMember by ID.
     */
    public function update(int $id, array $data): ?FamilyMember
    {
        $familyMember = $this->findById($id);
        if ($familyMember) {
            $familyMember->update($data);
        }
        return $familyMember;
    }

    /**
     * Delete a familyMember by ID.
     */
    public function delete(int $id): void
    {
        $familyMember = $this->findById($id);
        if ($familyMember) {
            $familyMember->delete();
        }
    }
}
