<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
              'name' => 'おつかい',
              'category' => 'おてつだい',
              'type' => 'よく頼む',
            ],
            [
              'name' => 'おへやおそうじ',
              'category' => 'おてつだい',
              'type' => 'たまに頼む',
            ],
            [
              'name' => 'おふろそうじ',
              'category' => 'おてつだい',
              'type' => 'よく頼む',
            ],
          ]);
    }
}
