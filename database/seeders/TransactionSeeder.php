<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'account_id' => '1',
            'transaction_title' => 'Testing Amount',
            'transaction_amt' => '1000',
            'transaction_type' => 'credit',
        ]);
    }
}
