<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'shop_id'=>'1',
            'user_id'=>'1',
            'date'=>now(),
            'time'=>now(),
            'headcount'=>'2',
        ];
        DB::table('reservations')->insert($param);
    }
}
