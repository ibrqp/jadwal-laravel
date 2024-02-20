<?php

use App\Http\Controllers\DudiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PklController;
use App\Http\Controllers\SiswaController;
use App\Models\Dudi;
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

// Route::resource('guru',GuruController::class);
// Route::resource('mapel',MapelController::class);
// Route::resource('pengajar',PengajarController::class);

Route::resource('siswa', SiswaController::class);
Route::resource('dudi', DudiController::class);
Route::resource('pkl', PklController::class);