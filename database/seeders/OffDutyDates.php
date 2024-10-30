<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OffDutyDates extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('off_duty_dates')->insert([
            [
                
                'category_id' => '1','Description' => 'happy','Date' =>now(),'Percentage' => 100,
               
            ],
         ]);
    }
}
