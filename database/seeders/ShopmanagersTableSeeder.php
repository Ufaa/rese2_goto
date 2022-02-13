<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopmanagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '後藤　大祐',
            'shop_id' => '101',
        ];
        DB::table('shopmanagers')->insert($param);

        $param = [
            'name' => '後藤　裕香',
            'shop_id' => '102',
        ];
        DB::table('shopmanagers')->insert($param);
    }
}
