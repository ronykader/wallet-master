<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['organization_id' => 1, 'name' => 'Salary', 'type' => 'Income']);
        Category::create(['organization_id' => 1, 'name' => 'Groceries', 'type' => 'Expense']);
    }
}
