<?php

use App\Http\Controllers\PageController;
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

Route::get('/convert', [PageController::class, 'convert'])->name('convert_number');
Route::post('currency',[PageController::class, 'exchangeCurrency'])->name('convert');
Route::get('testword', [PageController::class, 'testword']);