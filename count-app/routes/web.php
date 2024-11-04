<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeCountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee-counts', [EmployeeCountController::class, 'showCountForm'])->name('employee.counts');
// Route::get('/api/employee-counts', [EmployeeCountController::class, 'countEmployees']);