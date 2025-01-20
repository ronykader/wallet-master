<?php

namespace App\Services\v1;

use App\Models\Organization;
use App\Repositories\v1\interfaces\OrganizationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OrganizationService
{
    public function __construct(private readonly OrganizationRepositoryInterface $organizationRepository)
    {
    }

    public function getAllOrganizations(): Collection
    {
        return $this->organizationRepository->getAll();
    }

    public function getOrganizationById(int $id): ?Organization
    {
        return $this->organizationRepository->findById($id);
    }

    public function createOrganization(array $data): Organization
    {
        return $this->organizationRepository->create($data);
    }

    public function updateOrganization(int $id, array $data): ?Organization
    {
        return $this->organizationRepository->update($id, $data);
    }

    public function deleteOrganization(int $id): void
    {
        $this->organizationRepository->delete($id);
    }
}
