<?php

namespace Database\Seeders;

use App\Models\FamilyMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamilyMember::create([
            'user_id' => 1,
            'managed_user_id' => 2,
            'name' => 'Spouse',
            'relationship' => 'Spouse'
        ]);
    }
}
