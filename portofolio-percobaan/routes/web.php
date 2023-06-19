<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarProductController;
use App\Http\Controllers\CategoryProductController;

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


// Homepage
Route::get('/',[HomePageController::class,'index']);
Route::get('/detail-product/{id}',[HomePageController::class,'show']);
Route::get('/all-product',[HomePageController::class,'all_product']);


// Dashboard
Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth','admin']);



// Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login',[AuthController::class, 'index'])->name('login');
    Route::post('/login',[AuthController::class, 'login']);
    
    // Registrasi
    Route::get('/registrasi',[AuthController::class, 'registrasi']);
    Route::post('/registrasi',[AuthController::class, 'store']);
//  });


 // logout
 Route::post('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

//  Route::middleware(['auth','admin'])->group(function () {
    
     // Cetegory
     Route::get('/category-product',[CategoryProductController::class,'index']);
     Route::get('/category-create',[CategoryProductController::class,'create']);
     Route::post('/category-store',[CategoryProductController::class,'store']);
     Route::get('/category-edit/{id}',[CategoryProductController::class,'edit']);
     Route::put('/category-update',[CategoryProductController::class,'update']);
     Route::delete('/category-destroy/{id}',[CategoryProductController::class,'destroy']);
     
     // Product
     Route::get('/daftar-product',[DaftarProductController::class,'index']);
     Route::get('/product-create',[DaftarProductController::class,'create']);
     Route::post('/product-store',[DaftarProductController::class,'store']);
     Route::get('/product-edit/{id}',[DaftarProductController::class,'edit']);
     Route::put('/product-update',[DaftarProductController::class,'update']);
     Route::delete('/product-destroy/{id}',[DaftarProductController::class,'destroy']);
    
     // Slider
     Route::get('/slider',[SliderController::class,'index']);
     Route::get('/slider-create',[SliderController::class,'create']);
     Route::post('/slider-store',[SliderController::class,'store']);
     Route::get('/slider-edit/{id}',[SliderController::class,'edit']);
     Route::put('/slider-update',[SliderController::class,'update']);
     Route::delete('/slider-destroy/{id}',[SliderController::class,'destroy']);
//  });

    


