<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class MeritLog extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('merit_logs')->insert([
            [
                
                'employee_id'=> 1,
    'employee_id_from'=> 1,
    'merit_category_id'=> '1',
    'merit_type_id'=> '1',
    'reasons'=> 'sad',
    'points'=> 100,
    'date'=> now(),               
            ],
         ]);
    }
}
