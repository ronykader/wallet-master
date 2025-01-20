<?php

namespace App\Repositories\v1;

use App\Models\SubscriptionPlan;
use App\Repositories\v1\interfaces\SubscriptionPlanRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionPlanRepository implements SubscriptionPlanRepositoryInterface
{
    /**
    * Get all subscriptionPlans.
    */
    public function getAll(): Collection
    {
        return SubscriptionPlan::all();
    }

    /**
     * Find a subscriptionPlan by ID.
     */
    public function findById(int $id): ?SubscriptionPlan
    {
        return SubscriptionPlan::find($id);
    }

    /**
     * Create a new subscriptionPlan.
     */
    public function create(array $data): SubscriptionPlan
    {
        return SubscriptionPlan::create($data);
    }

    /**
     * Update a subscriptionPlan by ID.
     */
    public function update(int $id, array $data): ?SubscriptionPlan
    {
        $subscriptionPlan = $this->findById($id);
        if ($subscriptionPlan) {
            $subscriptionPlan->update($data);
        }
        return $subscriptionPlan;
    }

    /**
     * Delete a subscriptionPlan by ID.
     */
    public function delete(int $id): void
    {
        $subscriptionPlan = $this->findById($id);
        if ($subscriptionPlan) {
            $subscriptionPlan->delete();
        }
    }
}
