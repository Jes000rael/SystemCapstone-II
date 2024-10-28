<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AttendanceRecord extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendance_records')->insert([
            [
                
                'Employee_id'=> '1',
    'Cutoff_id'=> '1',
    'Total_hours'=> '1',
    'Total_break'=> '1',
    'Total_ot'=> 1,
    'Rate'=> '2',
    'Date'=> now(),
   'Duty_start'=> now(),
    'Time_in'=> now(),
    'Time_out'=> now(),
    'Status'=> '22',
    'Has_night_diff'=> '1',
               
            ],
         ]);
    }
}
