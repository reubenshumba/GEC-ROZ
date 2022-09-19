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

Route::get('/gec/{url}', [RozRegisterController::class, 'create'])->name('zone-register-create');
Route::post('/gec/{url}', [RozRegisterController::class, 'save'])->name('zone-register-save');
Route::post('/', [RozRegisterController::class, 'store'])->name('zone-register-store');


Auth::routes();
Route::get('/gec/view/{url}', [RozRegisterController::class, 'index'])->name('zone-register-view');
Route::get('/setup', [SetupController::class, 'index'])->name('setup-index');
Route::post('/setup', [SetupController::class, 'save'])->name('setup-save');
