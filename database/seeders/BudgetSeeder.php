<?php

namespace Database\Seeders;

use App\Models\Budget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Budget::create([
            'user_id' => 1,
            'category_id' => 2,
            'amount' => 500,
            'start_date' => now()->startOfMonth(),
            'end_date' => now()->endOfMonth()
        ]);
    }
}
