<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\studentController;

use App\models\employee;

use Illuminate\Support\Facades\response;
use APP\Http\Controllers\myuploads;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/employee_store',[EmployeeController::class, 'store']);

Route::post('/employee_update/{id}',[EmployeeController::class, 'update']);

Route::post('/student_store',[studentcontroller::class,'store']);

Route::apiResource('/authors', App\Http\Controllers\AuthorsController::class);


