<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::create(['name' => 'Company A', 'subscription_plan_id' => 1]);
        Organization::create(['name' => 'Company B', 'subscription_plan_id' => 2]);
    }
}
