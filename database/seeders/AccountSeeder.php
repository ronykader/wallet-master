<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create(['user_id' => 1, 'organization_id' => 1, 'account_name' => 'Savings Account', 'account_type' => 'Bank Account', 'account_number' => 1245, 'account_status' => 'Active', 'balance' => 1000.00]);
        Account::create(['user_id' => 2, 'organization_id' => 2, 'account_name' => 'Checking Account', 'account_type' => 'Credit Card', 'account_number' => 456, 'account_status' => 'Active', 'balance' => 500.00]);
    }
}
