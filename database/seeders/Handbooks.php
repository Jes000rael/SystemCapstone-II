<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Handbooks extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Handbooks')->insert([
            [
                
                'Description'=> 'sss',
         'Link'=> 'https::','Date'=> now(),
               
            ],
         ]);
    }
}
