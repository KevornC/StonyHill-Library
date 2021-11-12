<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');
Auth::routes();

Route::middleware(['Auth'])->group(function(){
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/stonyhill/library/books',[\App\Http\Controllers\BookController::class,'index'])->name('books');
    Route::get('/stonyhill/library/member',[\App\Http\Controllers\MemberController::class,'index'])->name('members');
    Route::get('/stonyhill/library/issuedbook',[\App\Http\Controllers\IssuedbookController::class,'index'])->name('issuedbooks');
});
    
