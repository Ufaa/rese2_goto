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
            'shop_id' => '1',
            'user_id' => '1',
            'num_of_users' => '4',
            'start_at' => '2021-01-9 19:00:00'
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'shop_id' => '19',
            'user_id' => '1',
            'num_of_users' => '2',
            'start_at' => '2021-01-17 18:30:00'
        ];
        DB::table('reservations')->insert($param);
    }
}
