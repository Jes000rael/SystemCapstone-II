<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Absence;
use App\Http\Controllers\Api\Announcement;
use App\Http\Controllers\Api\AttendanceRecords;
use App\Http\Controllers\Api\BreaktimeLogs;
use App\Http\Controllers\Api\Companys;
use App\Http\Controllers\Api\Cutoffs;
use App\Http\Controllers\Api\Deduction;
use App\Http\Controllers\Api\Departments;
use App\Http\Controllers\Api\EmployeeRecord;
use App\Http\Controllers\Api\EmploymentStatu;
use App\Http\Controllers\Api\Handbook;
use App\Http\Controllers\Api\JobTitles;
use App\Http\Controllers\Api\MeritCategorys;
use App\Http\Controllers\Api\MeritLogs;
use App\Http\Controllers\Api\MeritTypes;
use App\Http\Controllers\Api\OffDutyCategorys;
use App\Http\Controllers\Api\OffDutyDate;
use App\Http\Controllers\Api\OvertimeLogs;
use App\Http\Controllers\Api\Payslips;
use App\Http\Controllers\Api\RequestTimeAdjustment;
use App\Http\Controllers\Api\RequestTimeTypes;
use App\Http\Controllers\Api\SeniorityLevels;
use App\Http\Controllers\Api\Shifts;
use App\Http\Controllers\Api\WorkSchedules;
use App\Http\Controllers\Api\AttendanceStatus;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee-records', [EmployeeRecord::class, 'index'])->name('employeeIndex');
Route::get('/employee-records/{id}', [EmployeeRecord::class, 'show']);
Route::post('/employee-records', [EmployeeRecord::class, 'store']);
Route::put('/employee-records/{id}', [EmployeeRecord::class, 'update']);
Route::delete('/employee-records/{id}', [EmployeeRecord::class, 'destroy']);


// 

Route::get('/absences', [Absence::class, 'index']);
Route::get('/absences/{id}', [Absence::class, 'show']);
Route::post('/absences', [Absence::class, 'store']);
Route::put('/absences/{id}', [Absence::class, 'update']);
Route::delete('/absences/{id}', [Absence::class, 'destroy']);

Route::get('/announcements', [Announcement::class, 'index']);
Route::get('/announcements/{id}', [Announcement::class, 'show']);
Route::post('/announcements', [Announcement::class, 'store']);
Route::put('/announcements/{id}', [Announcement::class, 'update']);
Route::delete('/announcements/{id}', [Announcement::class, 'destroy']);


Route::get('/attendanceRecords', [AttendanceRecords::class, 'index']);
Route::get('/attendanceRecords/{id}', [AttendanceRecords::class, 'show']);
Route::post('/attendanceRecords', [AttendanceRecords::class, 'store']);
Route::put('/attendanceRecords/{id}', [AttendanceRecords::class, 'update']);
Route::delete('/attendanceRecords/{id}', [AttendanceRecords::class, 'destroy']);



Route::get('/attendanceStatus', [AttendanceStatus::class, 'index']);
Route::get('/attendanceStatus/{id}', [AttendanceStatus::class, 'show']);
Route::post('/attendanceStatus', [AttendanceStatus::class, 'store']);
Route::put('/attendanceStatus/{id}', [AttendanceStatus::class, 'update']);
Route::delete('/attendanceStatus/{id}', [AttendanceStatus::class, 'destroy']);



Route::get('/breaktimeLogs', [BreaktimeLogs::class, 'index']);
Route::get('/breaktimeLogs/{id}', [BreaktimeLogs::class, 'show']);
Route::post('/breaktimeLogs', [BreaktimeLogs::class, 'store']);
Route::put('/breaktimeLogs/{id}', [BreaktimeLogs::class, 'update']);
Route::delete('/breaktimeLogs/{id}', [BreaktimeLogs::class, 'destroy']);

Route::get('/company', [Companys::class, 'index']);
Route::get('/company/{id}', [Companys::class, 'show']);
Route::post('/company', [Companys::class, 'store']);
Route::put('/company/{id}', [Companys::class, 'update']);
Route::delete('/company/{id}', [Companys::class, 'destroy']);

Route::get('/cutoffs', [Cutoffs::class, 'index']);
Route::get('/cutoffs/{id}', [Cutoffs::class, 'show']);
Route::post('/cutoffs', [Cutoffs::class, 'store']);
Route::put('/cutoffs/{id}', [Cutoffs::class, 'update']);
Route::delete('/cutoffs/{id}', [Cutoffs::class, 'destroy']);


Route::get('/deductions', [Deduction::class, 'index']);
Route::get('/deductions/{id}', [Deduction::class, 'show']);
Route::post('/deductions', [Deduction::class, 'store']);
Route::put('/deductions/{id}', [Deduction::class, 'update']);
Route::delete('/deductions/{id}', [Deduction::class, 'destroy']);



Route::get('/departments', [Departments::class, 'index']);
Route::get('/departments/{id}', [Departments::class, 'show']);
Route::post('/departments', [Departments::class, 'store']);
Route::put('/departments/{id}', [Departments::class, 'update']);
Route::delete('/departments/{id}', [Departments::class, 'destroy']);



Route::get('/employmentStatus', [EmploymentStatu::class, 'index']);
Route::get('/employmentStatus/{id}', [EmploymentStatu::class, 'show']);
Route::post('/employmentStatus', [EmploymentStatu::class, 'store']);
Route::put('/employmentStatus/{id}', [EmploymentStatu::class, 'update']);
Route::delete('/employmentStatus/{id}', [EmploymentStatu::class, 'destroy']);


Route::get('/handbooks', [Handbook::class, 'index']);
Route::get('/handbooks/{id}', [Handbook::class, 'show']);
Route::post('/handbooks', [Handbook::class, 'store']);
Route::put('/handbooks/{id}', [Handbook::class, 'update']);
Route::delete('/handbooks/{id}', [Handbook::class, 'destroy']);



Route::get('/jobTitles', [JobTitles::class, 'index']);
Route::get('/jobTitles/{id}', [JobTitles::class, 'show']);
Route::post('/jobTitles', [JobTitles::class, 'store']);
Route::put('/jobTitles/{id}', [JobTitles::class, 'update']);
Route::delete('/jobTitles/{id}', [JobTitles::class, 'destroy']);



Route::get('/meritCategorys', [MeritCategorys::class, 'index']);
Route::get('/meritCategorys/{id}', [MeritCategorys::class, 'show']);
Route::post('/meritCategorys', [MeritCategorys::class, 'store']);
Route::put('/meritCategorys/{id}', [MeritCategorys::class, 'update']);
Route::delete('/meritCategorys/{id}', [MeritCategorys::class, 'destroy']);



Route::get('/meritLogs', [MeritLogs::class, 'index']);
Route::get('/meritLogs/{id}', [MeritLogs::class, 'show']);
Route::post('/meritLogs', [MeritLogs::class, 'store']);
Route::put('/meritLogs/{id}', [MeritLogs::class, 'update']);
Route::delete('/meritLogs/{id}', [MeritLogs::class, 'destroy']);



Route::get('/meritTypes', [MeritTypes::class, 'index']);
Route::get('/meritTypes/{id}', [MeritTypes::class, 'show']);
Route::post('/meritTypes', [MeritTypes::class, 'store']);
Route::put('/meritTypes/{id}', [MeritTypes::class, 'update']);
Route::delete('/meritTypes/{id}', [MeritTypes::class, 'destroy']);


Route::get('/offDutyCategorys', [OffDutyCategorys::class, 'index']);
Route::get('/offDutyCategorys/{id}', [OffDutyCategorys::class, 'show']);
Route::post('/offDutyCategorys', [OffDutyCategorys::class, 'store']);
Route::put('/offDutyCategorys/{id}', [OffDutyCategorys::class, 'update']);
Route::delete('/offDutyCategorys/{id}', [OffDutyCategorys::class, 'destroy']);


Route::get('/offDutyDates', [OffDutyDate::class, 'index']);
Route::get('/offDutyDates/{id}', [OffDutyDate::class, 'show']);
Route::post('/offDutyDates', [OffDutyDate::class, 'store']);
Route::put('/offDutyDates/{id}', [OffDutyDate::class, 'update']);
Route::delete('/offDutyDates/{id}', [OffDutyDate::class, 'destroy']);



Route::get('/overtimeLogs', [OvertimeLogs::class, 'index']);
Route::get('/overtimeLogs/{id}', [OvertimeLogs::class, 'show']);
Route::post('/overtimeLogs', [OvertimeLogs::class, 'store']);
Route::put('/overtimeLogs/{id}', [OvertimeLogs::class, 'update']);
Route::delete('/overtimeLogs/{id}', [OvertimeLogs::class, 'destroy']);


Route::get('/payslips', [Payslips::class, 'index']);
Route::get('/payslips/{id}', [Payslips::class, 'show']);
Route::post('/payslips', [Payslips::class, 'store']);
Route::put('/payslips/{id}', [Payslips::class, 'update']);
Route::delete('/payslips/{id}', [Payslips::class, 'destroy']);



Route::get('/requestTimeAdjustments', [RequestTimeAdjustment::class, 'index']);
Route::get('/requestTimeAdjustments/{id}', [RequestTimeAdjustment::class, 'show']);
Route::post('/requestTimeAdjustments', [RequestTimeAdjustment::class, 'store']);
Route::put('/requestTimeAdjustments/{id}', [RequestTimeAdjustment::class, 'update']);
Route::delete('/requestTimeAdjustments/{id}', [RequestTimeAdjustment::class, 'destroy']);





Route::get('/requestTimeTypes', [RequestTimeTypes::class, 'index']);
Route::get('/requestTimeTypes/{id}', [RequestTimeTypes::class, 'show']);
Route::post('/requestTimeTypes', [RequestTimeTypes::class, 'store']);
Route::put('/requestTimeTypes/{id}', [RequestTimeTypes::class, 'update']);
Route::delete('/requestTimeTypes/{id}', [RequestTimeTypes::class, 'destroy']);




Route::get('seniorityLevels', [SeniorityLevels::class, 'index']);
Route::get('/seniorityLevels/{id}', [SeniorityLevels::class, 'show']);
Route::post('/seniorityLevels', [SeniorityLevels::class, 'store']);
Route::put('/seniorityLevels/{id}', [SeniorityLevels::class, 'update']);
Route::delete('/seniorityLevels/{id}', [SeniorityLevels::class, 'destroy']);






Route::get('shifts', [Shifts::class, 'index']);
Route::get('/shifts/{id}', [Shifts::class, 'show']);
Route::post('/shifts', [Shifts::class, 'store']);
Route::put('/shifts/{id}', [Shifts::class, 'update']);
Route::delete('/shifts/{id}', [Shifts::class, 'destroy']);




Route::get('workSchedules', [WorkSchedules::class, 'index']);
Route::get('/workSchedules/{id}', [WorkSchedules::class, 'show']);
Route::post('/workSchedules', [WorkSchedules::class, 'store']);
Route::put('/workSchedules/{id}', [WorkSchedules::class, 'update']);
Route::delete('/workSchedules/{id}', [WorkSchedules::class, 'destroy']);
