<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class WorkSchedule extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('work_schedules')->insert([
            [
                
        'employee_id'=> '1',
        'monday_in'=> '9:00:00',
        'monday_out'=> '17:00:00',
        'tuesday_in'=> '9:00:00',
        'tuesday_out'=> '17:00:00',
        'wednesday_in'=> '9:00:00',
        'wednesday_out'=> '17:00:00',
        'thursday_in'=> '9:00:00',
        'thursday_out'=> '17:00:00',
        'friday_in'=> '9:00:00',
        'friday_out'=> '17:00:00',
        'saturday_in'=> null,
        'saturday_out'=> null,
        'sunday_in'=> null,
        'sunday_out'=> null,
        'updated_by'=> 1,'update_on'=> now(),
               
            ],
         ]);
    }
}
