<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\PositionController;


Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);
Route::get('employees/{id}/assign', [EmployeeController::class, 'assignForm'])->name('employees.assign');
Route::post('employees/{id}/assign', [EmployeeController::class, 'assignSave'])->name('employees.assign.save');


Route::get('/', function () {
    return view('master');
});









