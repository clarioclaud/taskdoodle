<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Book;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;

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
    $books = Book::where('status',1)->latest()->get();
    return view('index',compact('books'));
})->name('frontend');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


/////// Student Task//////////
Route::get('/student', function () {
    $students = Student::all(); 
    return view('student', compact('students'));
});

Route::get('/update/{id}', [StudentController::class,'UpdateStudent'])->name('update.student');
Route::post('/update/student', [StudentController::class,'EditStudent'])->name('store.student');
Route::get('/delete/student/{id}', [StudentController::class,'DeleteStudent'])->name('delete.student');
Route::get('/export/student', [StudentController::class,'ExportStudent'])->name('export');
Route::get('/export/all', [StudentController::class,'ExportallStudent'])->name('export.all');


////////////E-library Admin///////////////
Route::group(['prefix' => 'admin'],function(){
    Route::get('/login', [AdminController::class,'Login'])->name('admin.login');
    Route::get('/register', [AdminController::class,'Register'])->name('admin.register');
    Route::post('/register/store', [AdminController::class,'RegisterStore'])->name('admin.register.create');
    Route::post('/login/store', [AdminController::class,'LoginStore'])->name('admin.login.create');
    Route::get('/dashboard', [AdminController::class,'Dashboard'])->name('admin.index')->middleware('admin');
    Route::get('/logout', [AdminController::class,'Logout'])->name('admin.logout')->middleware('admin');
    Route::get('/users', [UserController::class,'Users'])->name('admin.users')->middleware('admin');
    Route::get('/users/edit/{id}', [UserController::class,'UserEdit'])->name('user.edit')->middleware('admin');
    Route::post('/users/update', [UserController::class,'UserUpdate'])->name('user.update')->middleware('admin');
    Route::get('/users/delete/{id}', [UserController::class,'UserDelete'])->name('user.delete')->middleware('admin');
    Route::get('/books', [BookController::class,'Books'])->name('admin.books')->middleware('admin');
    Route::post('/books/add', [BookController::class,'BookAdd'])->name('book.add')->middleware('admin');
    Route::get('/book/edit/{id}', [BookController::class,'BookEdit'])->name('book.edit')->middleware('admin');
    Route::post('/books/update', [BookController::class,'BookUpdate'])->name('book.update')->middleware('admin');
    Route::get('/book/delete/{id}', [BookController::class,'BookDelete'])->name('book.delete')->middleware('admin');
    Route::get('/book/status/{id}', [BookController::class,'BookStatus'])->name('book.status')->middleware('admin');
    Route::get('/subscription', [BookController::class,'Subscription'])->name('admin.subscription')->middleware('admin');
});

//////////////user routes/////////
Route::post('/user/subscribe', [UserController::class,'Subscribe'])->name('subscribe.book')->middleware(['auth']);
Route::get('/user/subscribe/list', [UserController::class,'SubscribeList'])->name('subscription.list')->middleware(['auth']);