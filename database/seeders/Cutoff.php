<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Cutoff extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Cutoffs')->insert([
            [
              
                'Date_start'=> now(),
    'Date_end'=> now(),
    'Conversion_rate'=> 100,
               
            ],
         ]);
    }
}
