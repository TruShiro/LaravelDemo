<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecordController;

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

//Main Page(Add data)
Route::get('/',[RecordController::class,'index'])->name('HomePage');

//Send data to database
Route::post('/stored',[RecordController::class,'store'])->name('AddData');

//Show data from database
Route::get('/table',[RecordController::class,'show'])->name('ShowData');

//Go to specific data edit page
Route::get('/edit/{id}',[RecordController::class,'edit'])->name('EditData');

//Update data
Route::post('/updated',[RecordController::class,'update'])->name('UpdateData');

//Delete data
Route::get('/deleted/{id}',[RecordController::class,'destroy'])->name('DeleteData');