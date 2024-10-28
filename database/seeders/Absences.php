<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Absences extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('absences')->insert([
            [
                'Employee_id' => 1,
                'Attendance_id' =>1,
                'Date' => now(),
                'Reason' => 'why',
            ],
            // You can add more entries here

            // 'Employee_id' => Carbon::now()->subHours(2),
            //     'End_time' => Carbon::now(),
            // 'End_time' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-10-16 14:00:00'),
        ]);
        
    }
}
