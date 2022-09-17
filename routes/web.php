<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RozRegisterController;
use App\Http\Controllers\SetupController;
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
});

Auth::routes();
Route::get('/setup', [SetupController::class, 'index'])->name('setup');
Route::post('/setup', [SetupController::class, 'save'])->name('setup');

Route::get('/zones/{url}', [RozRegisterController::class, 'index'])->name('zone-register');
Route::post('/campus/{url}', [RozRegisterController::class, 'index'])->name('campus-register');
Route::get('/zones/{url}/view', [RozRegisterController::class, 'show'])->name('register-view');
