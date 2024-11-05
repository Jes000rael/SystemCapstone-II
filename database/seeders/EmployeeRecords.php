<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;


class EmployeeRecords extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_records')->insert([
            [
              
                'company_id'=> 1,
                'first_name'=> 'Jesrael',
                'last_name'=> 'Escaran',
                'middle_name'=> 'D.',
                'suffix'=> '1',
                'blood_type'=> '1',
                'address'=> '1',
                'seniority_level_id'=> '1',
                'employment_status_id'=> '1',
                'job_title_id'=> '1',
                'department_id'=> '1',
                'date_of_birth'=> now(),
                'date_hired'=>now(),
                'date_start'=> now(),
                'hourly_rate'=> 1,
                'has_night_diff'=> 1,
                'username'=> 'jes2kim6@gmail.com',
                'password'=> Hash::make('jes2kim6@gmail.com'),
                'password_string'=> 'jes2kim6@gmail.com',
                'contact_number'=> 123123123,
                'emergency_contact'=> 123123123,
                'emergency_person'=> 'jes2kim6@gmail.com',
                'relationship'=> 'jes2kim6@gmail.com',
                'tin'=> 'jes2kim6@gmail.com',
                'sss'=> 'jes2kim6@gmail.com',
                'pagibig'=> 'jes2kim6@gmail.com',
                'philhealth'=> 'jes2kim6@gmail.com',
                'shift_id'=> 1,'Date_added'=> now(),
               
            ],
         ]);
    }
}
