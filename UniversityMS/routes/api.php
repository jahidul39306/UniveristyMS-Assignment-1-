<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentApiController;
use App\Http\Controllers\DepartmentApiController;
use App\Http\Controllers\DepartmentStudentApiController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//student
Route::post('/student/add', [StudentApiController::class, 'addStudent'])->name('student.add');
Route::get('/student/get/{id}', [StudentApiController::class, 'getStudent'])->name('student.get');
Route::get('/student/getall', [StudentApiController::class, 'getAllStudent'])->name('student.get.all');
Route::post('/student/edit/{id}', [StudentApiController::class, 'editStudent'])->name('student.edit');
Route::post('/student/delete/{id}', [StudentApiController::class, 'deleteStudent'])->name('student.delete');

//department
Route::post('/department/add', [DepartmentApiController::class, 'addDepartment'])->name('department.add');
Route::get('/department/get/{id}', [DepartmentApiController::class, 'getDepartment'])->name('department.get');
Route::get('/department/getall', [DepartmentApiController::class, 'getAllDepartment'])->name('department.get.all');
Route::post('/department/edit/{id}', [DepartmentApiController::class, 'editDepartment'])->name('department.edit');
Route::post('/department/delete/{id}', [DepartmentApiController::class, 'deleteDepartment'])->name('department.delete');

//department student
Route::get('/department/student/details/{id}', [DepartmentStudentApiController::class, 'studentDetails'])->name('department.student.details');