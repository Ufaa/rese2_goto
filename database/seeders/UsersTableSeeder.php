<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '管理者',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
            'role' => '1',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '店舗代表者1',
            'email' => 'tenpo1@example.com',
            'password' => bcrypt('password'),
            'role' => '5',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => bcrypt('password'),
            'role' => '10',
        ];
        DB::table('users')->insert($param);
    }
}
