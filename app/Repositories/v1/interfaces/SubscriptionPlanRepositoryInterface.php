<?php

namespace App\Repositories\v1\interfaces;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Collection;

interface SubscriptionPlanRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?SubscriptionPlan;

    public function create(array $data): SubscriptionPlan;

    public function update(int $id, array $data): ?SubscriptionPlan;

    public function delete(int $id): void;
}
