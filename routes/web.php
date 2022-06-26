<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TicketController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/issues', [TicketController::class, 'index'])->name('issues');
    Route::post('/createissue', [TicketController::class, 'createissue'])->name('createissue');
    Route::get('/editissue/{id}', [TicketController::class, 'editissue'])->name('editissue');
    Route::post('/updateissue/{id}', [TicketController::class, 'updateissue'])->name('updateissue');
    Route::post('/lockissue/{id}', [TicketController::class, 'lockissue'])->name('lockissue');
    Route::get('/unlockissue/{id}', [TicketController::class, 'unlockissue'])->name('unlockissue');


});