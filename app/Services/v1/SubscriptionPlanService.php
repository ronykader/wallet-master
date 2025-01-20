<?php

namespace App\Services\v1;

use App\Models\SubscriptionPlan;
use App\Repositories\v1\interfaces\SubscriptionPlanRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionPlanService
{
    public function __construct(private readonly SubscriptionPlanRepositoryInterface $subscriptionPlanRepository)
    {
    }

    public function getAllSubscriptionPlans(): Collection
    {
        return $this->subscriptionPlanRepository->getAll();
    }

    public function getSubscriptionPlanById(int $id): ?SubscriptionPlan
    {
        return $this->subscriptionPlanRepository->findById($id);
    }

    public function createSubscriptionPlan(array $data): SubscriptionPlan
    {
        return $this->subscriptionPlanRepository->create($data);
    }

    public function updateSubscriptionPlan(int $id, array $data): ?SubscriptionPlan
    {
        return $this->subscriptionPlanRepository->update($id, $data);
    }

    public function deleteSubscriptionPlan(int $id): void
    {
        $this->subscriptionPlanRepository->delete($id);
    }
}
