<?php

namespace App\Repositories\v1;

use App\Models\Organization;
use App\Repositories\v1\interfaces\OrganizationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OrganizationRepository implements OrganizationRepositoryInterface
{
    /**
    * Get all organizations.
    */
    public function getAll(): Collection
    {
        return Organization::all();
    }

    /**
     * Find a organization by ID.
     */
    public function findById(int $id): ?Organization
    {
        return Organization::find($id);
    }

    /**
     * Create a new organization.
     */
    public function create(array $data): Organization
    {
        return Organization::create($data);
    }

    /**
     * Update a organization by ID.
     */
    public function update(int $id, array $data): ?Organization
    {
        $organization = $this->findById($id);
        if ($organization) {
            $organization->update($data);
        }
        return $organization;
    }

    /**
     * Delete a organization by ID.
     */
    public function delete(int $id): void
    {
        $organization = $this->findById($id);
        if ($organization) {
            $organization->delete();
        }
    }
}
