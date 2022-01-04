<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiController;

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

//////for student tasks///////
Route::get('/student/details',[StudentController::class,'Details']);
Route::put('/student/update/{regid}',[StudentController::class,'Update']);
Route::delete('/student/delete/{regid}',[StudentController::class,'Delete']);



///////for library////////
Route::prefix('user')->group(function(){
    Route::post('/register',[ApiController::class,'Register']);
    Route::post('/login',[ApiController::class,'Login']);
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum'],function(){
    Route::get('/logout',[ApiController::class, 'Logout']);
});


Route::group(['prefix' => 'book', 'middleware' => 'auth:sanctum'],function(){
    Route::get('/list',[ApiController::class, 'Books']);
    Route::post('/subscribe',[ApiController::class, 'SubscribeBook']);
	Route::get('/subscribe/list',[ApiController::class, 'SubscribeList']);
});
