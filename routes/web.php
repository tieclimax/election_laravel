<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VoteController;
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
    return redirect()->route('register.pre');
});


Auth::routes();


Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::get('/pre-register', [RegisterController::class, 'Pre_register'])->name('register.pre');
Route::get('/group-register', [RegisterController::class, 'Show_group_register'])->name('register.group.show');
Route::post('/group-register', [RegisterController::class, 'Group_register'])->name('register.group');
Route::post('/register', [RegisterController::class, 'Register'])->name('register');
Route::get('/reset', [VoteController::class, 'index'])->name('reset');
