<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Announcement extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('announcements')->insert([
            [
                'Description' => 'yeah',
                'company_id' => 1,
                'Date'=>now(),
               
            ],
         ]);
    }
}
