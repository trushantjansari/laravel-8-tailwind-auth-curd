<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'user_id' => '1',
            'account_number' => '9875846',
            'account_type' => 'primary',
            'account_balance' => '10000',
            'status' => 'active',
        ]);
    }
}
