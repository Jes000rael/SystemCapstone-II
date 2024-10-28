<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Deductions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Deductions')->insert([
            [
             
                'employee_id' => '1',
'description' => 'Naka Guba sang Mouse',
'value' => '5',
               
            ],
         ]);
    }
}
