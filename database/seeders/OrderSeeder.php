<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
              'set_point' => 1000,
              'user_id' => 1,
              'task_id' => 1,
              'start_date' => '2024/04/01',
              'end_date' => '2024/04/01',
            ],
            [
              'set_point' => 1000,
              'user_id' => 1,
              'task_id' => 2,
              'start_date' => '2024/04/01',
              'end_date' => '2024/04/01',
            ],
            [
              'set_point' => 1000,
              'user_id' => 1,
              'task_id' => 3,
              'start_date' => '2024/04/01',
              'end_date' => '2024/04/01',
            ],
            [
              'set_point' => 1000,
              'user_id' => 2,
              'task_id' => 3,
              'start_date' => '2024/04/01',
              'end_date' => '2024/04/01',
            ],
            [
              'set_point' => 1000,
              'user_id' => 2,
              'task_id' => 3,
              'start_date' => '2024/04/01',
              'end_date' => '2024/04/01',
              ],


          ]);}
}
