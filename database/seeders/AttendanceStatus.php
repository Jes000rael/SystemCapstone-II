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
                
                'description'=> 'salamat',
    'min'=> 1,
    'max'=> 3,
   
               
            ],
         ]);
    }
}
