<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'reservation_id' => '16',
            'user_id' => '2',
            'rate' => '5',
            'comment' => '非常に美味しかったです。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
            'reservation_id' => '18',
            'user_id' => '2',
            'rate' => '3',
            'comment' => 'まぁまぁでした。',
        ];
        DB::table('reviews')->insert($param);

        $param = [
            'reservation_id' => '19',
            'user_id' => '2',
            'rate' => '1',
            'comment' => '最悪・・・',
        ];
        DB::table('reviews')->insert($param);
    }
}
