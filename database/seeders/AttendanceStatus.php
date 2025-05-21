<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendance_statuses')->insert([
               [
                'Description' => 'On Time',
                
               
            ],
            
               [
                'Description' => 'Late',
                
               
            ],
              [
                'Description' => 'On Leave',
                
               
            ],
            [
                'Description' => 'Absent',
                
               
            ],
              [
                'Description' => 'Time Adjustment',
                
               
            ],
          
          
         ]);
    }
}
