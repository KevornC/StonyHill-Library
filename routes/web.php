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

//API
Route::get('/API/members',[\App\Http\Controllers\APIController::class,'members'])->name('APImembers');
Route::get('/API/member/update/{id}',[\App\Http\Controllers\APIController::class,'membershow'])->name('APImemberUpdate');
Route::post('/API/member/update',[\App\Http\Controllers\APIController::class,'memberupdate'])->name('APImemberUpdatedd');
Route::post('/API/members',[\App\Http\Controllers\APIController::class,'membersearch'])->name('APImemberSearch');

Route::get('/API/books',[\App\Http\Controllers\APIController::class,'books'])->name('APIbooks');
Route::get('/API/book/update/{id}',[\App\Http\Controllers\APIController::class,'bookshow'])->name('APIbookupdate');
Route::post('/API/book/update',[\App\Http\Controllers\APIController::class,'bookupdate'])->name('APIbookupdated');
Route::post('/API/book/search',[\App\Http\Controllers\APIController::class,'booksearch'])->name('APIbooksearch');