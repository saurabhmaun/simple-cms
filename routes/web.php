<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Livewire\Counter;

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
//Auth::routes();
Route::get('/page-list', [PageController::class, 'index']);
Route::get('/page', [PageController::class, 'create'])->name('addNewPage');
Route::post('/page', [PageController::class, 'store'])->name('storePage');
Route::get('/page/edit/{id}', [PageController::class, 'edit']);
Route::get('/page/delete/{id}', [PageController::class, 'delete']);