<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $students = Student::all(); 
    return view('student', compact('students'));
});

Route::get('/update/{id}', [StudentController::class,'UpdateStudent'])->name('update.student');
Route::post('/update/student', [StudentController::class,'EditStudent'])->name('store.student');
Route::get('/delete/student/{id}', [StudentController::class,'DeleteStudent'])->name('delete.student');
Route::get('/export/student', [StudentController::class,'ExportStudent'])->name('export');
Route::get('/export/all', [StudentController::class,'ExportallStudent'])->name('export.all');
