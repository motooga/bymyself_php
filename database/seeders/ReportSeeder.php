<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reports')->insert([
            [
              'order_id' => 1,
              'user_id' => 1,
              'is_done' => 1,
              'reportphoto_url' => null,
              'memo' => 'おわったよー',
            ],
            [
                'order_id' => 2,
                'user_id' => 1,
                'is_done' => 1,
                'reportphoto_url' => null,
                'memo' => 'できました',
              ],
              [
                'order_id' => 3,
                'user_id' => 2,
                'is_done' => 2,
                'reportphoto_url' => null,
                'memo' => '',
              ],
            
          ]);}
    }
