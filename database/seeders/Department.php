<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Department extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'Description' => 'Super Enopoly',
                'company_id' => 1,
               
            ],
            [
                'Description' => 'Human Resources',
                'company_id' => 1,
            ],
         ]);
    }
}
