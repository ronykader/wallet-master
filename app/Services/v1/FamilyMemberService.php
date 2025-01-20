<?php

namespace App\Services\v1;

use App\Models\FamilyMember;
use App\Repositories\v1\interfaces\FamilyMemberRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FamilyMemberService
{
    public function __construct(private readonly FamilyMemberRepositoryInterface $familyMemberRepository)
    {
    }

    public function getAllFamilyMembers(): Collection
    {
        return $this->familyMemberRepository->getAll();
    }

    public function getFamilyMemberById(int $id): ?FamilyMember
    {
        return $this->familyMemberRepository->findById($id);
    }

    public function createFamilyMember(array $data): FamilyMember
    {
        return $this->familyMemberRepository->create($data);
    }

    public function updateFamilyMember(int $id, array $data): ?FamilyMember
    {
        return $this->familyMemberRepository->update($id, $data);
    }

    public function deleteFamilyMember(int $id): void
    {
        $this->familyMemberRepository->delete($id);
    }
}
