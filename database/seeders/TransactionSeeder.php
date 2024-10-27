<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'account_id' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'amount' => 2000,
            'transaction_date' => now(),
            'type' => 'Income',
            'note' => 'Monthly Salary'
        ]);

        Transaction::create([
            'account_id' => 1,
            'user_id' => 1,
            'category_id' => 2,
            'amount' => 150,
            'transaction_date' => now(),
            'type' => 'Expense',
            'note' => 'Grocery Shopping'
        ]);
    }
}
