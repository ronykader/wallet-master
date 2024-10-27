<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::create(['name' => 'Free', 'price' => 0, 'features' => json_encode(['basic feature'])]);
        SubscriptionPlan::create(['name' => 'Basic', 'price' => 10, 'features' => json_encode(['basic', 'premium support'])]);
        SubscriptionPlan::create(['name' => 'Premium', 'price' => 20, 'features' => json_encode(['all features'])]);
    }
}
