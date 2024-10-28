<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class BreaktimeLog extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('breaktime_logs')->insert([
            [
                
                'Attendance_id'=> 1,
    
    'Total_hours'=>'1:00:00',
    'Start_time'=> now(),
    'End_time'=> now(),
    'Field'=> 'sad',
               
            ],
         ]);
    }
}
