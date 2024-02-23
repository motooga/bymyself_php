<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            [
              'schedule_type' => 0,
              'start_date' => '2024/04/01',
              'end_date' => '2024/04/01',
            ],
            [
              'schedule_type' => 1,
              'start_date' => '2024/04/01',
              'end_date' => '2025/04/01',
            ],
            [
              'schedule_type' => 2,
              'start_date' => '2024/04/01',
              'end_date' => '2025/04/01',
            ],
          ]);
    }
}
