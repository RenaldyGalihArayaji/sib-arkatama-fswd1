<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarProductController;
use App\Http\Controllers\GroupPenggunaController;
use App\Http\Controllers\DaftarPenggunaController;
use App\Http\Controllers\CategoryProductController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// landing page
Route::get('/', function () {
    return view('/landing-page.home',[ "title" => "Home" ]);
});

// Dashboard
Route::get('/dashboard',[DashboardController::class,'index']);


// Category Product
Route::get('/category-product',[CategoryProductController::class,'index']);
Route::get('/category-create',[CategoryProductController::class,'create']);
Route::post('/category-store',[CategoryProductController::class,'store']);
Route::get('/category-edit/{id}',[CategoryProductController::class,'edit']);
Route::put('/category-update',[CategoryProductController::class,'update']);
Route::get('/category-delete/{id}',[CategoryProductController::class,'delete']);


// Daftar Product
Route::get('/daftar-product',[DaftarProductController::class,'index']);
Route::get('/daftar-create',[DaftarProductController::class,'create']);
Route::post('/daftar-store',[DaftarProductController::class,'store']);
Route::get('/daftar-edit/{id}',[DaftarProductController::class,'edit']);
Route::put('/daftar-update',[DaftarProductController::class,'update']);
Route::get('/daftar-delete/{id}',[DaftarProductController::class,'delete']);

//Group pengguna
Route::get('/group-pengguna',[GroupPenggunaController::class,'index']);
Route::get('/group-create',[GroupPenggunaController::class,'create']);
Route::post('/group-store',[GroupPenggunaController::class,'store']);
Route::get('/group-edit/{id}',[GroupPenggunaController::class,'edit']);
Route::put('/group-update',[GroupPenggunaController::class,'update']);
Route::get('/group-delete/{id}',[GroupPenggunaController::class,'delete']);

// Daftar Pengguna
Route::get('/daftar-pengguna',[DaftarPenggunaController::class,'index']);
Route::get('/daftar-create',[DaftarPenggunaController::class,'create']);
Route::post('/daftar-store',[DaftarPenggunaController::class,'store']);
Route::get('/daftar-edit/{id}',[DaftarPenggunaController::class,'edit']);
Route::put('/daftar-update',[DaftarPenggunaController::class,'update']);
Route::get('/daftar-delete/{id}',[DaftarPenggunaController::class,'delete']);

// slider
Route::get('/slider',[SliderController::class,'index']);
Route::get('/slider-create',[SliderController::class,'create']);
Route::post('/slider-store',[SliderController::class,'store']);
Route::get('/slider-edit/{id}',[SliderController::class,'edit']);
Route::put('/slider-update',[SliderController::class,'update']);
Route::get('/slider-delete/{id}',[SliderController::class,'delete']);
