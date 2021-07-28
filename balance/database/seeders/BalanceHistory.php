<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class BalanceHistory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {

            $balance = 0;
            for($j = 1; $j < 50; $j++){

                 $rand_value = rand(-100,100);
                 $balance += $rand_value;

                DB::table('balance_history')->insert([
                    'user_id' => $i,
                    'value' => $rand_value,
                    'balance' => $balance
                ]);

            }
        }


    }
}
