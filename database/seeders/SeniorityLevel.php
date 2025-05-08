<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SeniorityLevel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seniority_levels')->insert([
            [
                'Description' => 'Senior Level',
                'company_id'=> 1
               
            ],
         ]);
    }
}
