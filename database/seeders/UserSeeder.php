<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
              'nickname' => '一太郎',
              'login_id' => 'taro1',
              'password' => Hash::make('password'),
              'family_id' => 1
            ],
            [
              'nickname' => '二太郎',
              'login_id' => 'taro2',
              'password' => Hash::make('password'),
              'family_id' => 1
            ],
            [
              'nickname' => 'さん太郎',
              'login_id' => 'taro3',
              'password' => Hash::make('password'),
              'family_id' => 1
            ],
          ]);
    }
}
