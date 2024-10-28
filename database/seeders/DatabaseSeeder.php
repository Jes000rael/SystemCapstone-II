<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Absences::class);
        $this->call(AttendanceRecord::class);
        $this->call(AttendanceStatus::class);
        $this->call(Announcement::class);
        $this->call(BreaktimeLog::class);
        $this->call(Company::class);
        $this->call(Cutoff::class);
        $this->call(Deductions::class);
        $this->call(Department::class);
        $this->call(EmployeeRecords::class);
        $this->call(EmploymentStatus::class);
        $this->call(Handbooks::class);
        $this->call(JobTitle::class);
        $this->call(MeritCategory::class);
        $this->call(MeritLog::class);
        $this->call(MeritType::class);
        $this->call(OffDutyCategory::class);
        $this->call(OffDutyDates::class);
        $this->call(OvertimeLog::class);
        $this->call(Payslip::class);
        $this->call(RequestTimeAdjustments::class);
        $this->call(RequestTimeType::class);
        $this->call(SeniorityLevel::class);
        $this->call(Shift::class);
        $this->call(WorkSchedule::class);



        User::factory()->create([
            'name' => 'rael',
            'email' => 'jes2kim6@gmail.com',
            'password' => Hash::make('jes2kim6@gmail.com')
        ]);
    }
}
