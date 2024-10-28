<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Payslip extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Payslips')->insert([
            [
                
                'Employee_id' => '1',
    'Cutoff_id' => '1',
    'Hours_rendered' => '222',
    'OT_rendered' => '33',
    'Total_deduction' => '111',
    'Total_pay' => '900',
               
            ],
         ]);
    }
}
