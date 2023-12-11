<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\LoginRedirect;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/regi',[UserController::class,'index']);
Route::get('/',[UserController::class,'login'])->name('login');
Route::post('/logincheck',[UserController::class,'logincheck'])->name('logincheck');
Route::get('country',[CountryController::class,'index']);
Route::get('state',[CountryController::class,'state']);
Route::post('savecountry',[CountryController::class,'store'])->name('savecountry');
Route::post('savestate',[CountryController::class,'savestate'])->name('savestate');
Route::post('selectstate',[CountryController::class,'selectstate'])->name('selectstate');
Route::post('registration',[UserController::class,'registration'])->name('registration');


Route::middleware([LoginCheck::class])->group(function () {
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
});
Route::middleware([LoginRedirect::class])->group(function () {
    Route::get('/',[UserController::class,'login'])->name('login');
});