<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class RequestTimeAdjustments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('request_time_adjustments')->insert([
            [
                
                'Attendance_id'=> '1',
                'Request_type_id'=> '1',
                'Start_time'=> now(),
                'End_time'=> now(),
                'Total_hours'=> '222',
                'Reason'=> 'sheshhh',
               
            ],
         ]);
    }
}
