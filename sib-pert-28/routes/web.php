<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\DaftarProductController;
use App\Http\Controllers\PasswordChangeController;
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





Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login',[AuthController::class, 'index'])->name('login');
    Route::post('/login',[AuthController::class, 'login']);
    
    // Registrasi
    Route::get('/registrasi',[AuthController::class, 'registrasi']);
    Route::post('/registrasi',[AuthController::class, 'store']);
});



Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('admin_or_staff');
    
    // logout
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    
    // Cetegory
    Route::middleware('admin_or_staff')->group(function(){
        Route::get('/category-product',[CategoryProductController::class,'index']);
        Route::get('/category-create',[CategoryProductController::class,'create']);
        Route::post('/category-store',[CategoryProductController::class,'store']);
        Route::get('/category-edit/{id}',[CategoryProductController::class,'edit']);
        Route::put('/category-update',[CategoryProductController::class,'update']);
        Route::delete('/category-destroy/{id}',[CategoryProductController::class,'destroy']);
        Route::get('/category-product/{id}',[CategoryProductController::class,'approve']);

    });
     
     // Product
     Route::get('/daftar-product',[DaftarProductController::class,'index'])->middleware('admin_or_staff');
     Route::get('/product-create',[DaftarProductController::class,'create'])->middleware('admin_or_staff');
     Route::post('/product-store',[DaftarProductController::class,'store'])->middleware('admin_or_staff');
     Route::get('/product-edit/{id}',[DaftarProductController::class,'edit'])->middleware('admin_or_staff');
     Route::put('/product-update',[DaftarProductController::class,'update'])->middleware('admin_or_staff');
     Route::delete('/product-destroy/{id}',[DaftarProductController::class,'destroy'])->middleware('admin');
     Route::get('/daftar-product/{id}',[DaftarProductController::class,'approve'])->middleware('admin');
    
     // Slider
     Route::get('/slider',[SliderController::class,'index'])->middleware('admin_or_staff');
     Route::get('/slider-create',[SliderController::class,'create'])->middleware('admin_or_staff');
     Route::post('/slider-store',[SliderController::class,'store'])->middleware('admin_or_staff');
     Route::get('/slider-edit/{id}',[SliderController::class,'edit'])->middleware('admin_or_staff');
     Route::put('/slider-update',[SliderController::class,'update'])->middleware('admin_or_staff');
     Route::delete('/slider-destroy/{id}',[SliderController::class,'destroy'])->middleware('admin_or_staff');

     // Pengguna user
     Route::get('/data-user',[DataPenggunaController::class,'index'])->middleware('admin');
     Route::delete('/data-user/{id}',[DataPenggunaController::class,'user_destroy'])->middleware('admin');

    //  Pengguna Staff
     Route::get('/data-staff',[DataPenggunaController::class,'staff'])->middleware('admin');
     Route::get('/staff-create',[DataPenggunaController::class,'staff_create'])->middleware('admin');
     Route::post('/staff-store',[DataPenggunaController::class,'staff_store'])->middleware('admin');
     Route::delete('/data-staff/{id}',[DataPenggunaController::class,'staff_destroy'])->middleware('admin');


    //  change Password
     Route::get('/change-password',[PasswordChangeController::class,'changePassword'])->name('changePassword')->middleware('admin_or_staff');
     Route::post('/change-password',[PasswordChangeController::class,'updatePassword'])->name('updatePassword')->middleware('admin_or_staff');
   
     //  profil admin & staff
      Route::get('/profil',[ProfilController::class,'index'])->middleware('admin_or_staff');
      Route::get('/profil-edit',[ProfilController::class,'edit'])->middleware('admin_or_staff');
      Route::put('/profil-update',[ProfilController::class,'update'])->middleware('admin_or_staff');

      //  profil user
      Route::get('/profil-user',[ProfilController::class,'user'])->middleware('user');
      Route::get('/profilUser-edit',[ProfilController::class,'userEdit'])->middleware('user');
      Route::put('/profilUser-update',[ProfilController::class,'userUpdate'])->middleware('user');

        // Change User
      Route::get('/change-passwordUser',[PasswordChangeController::class,'changePasswordUser'])->middleware('user');
      Route::post('/change-passwordUser',[PasswordChangeController::class,'updatePasswordUser'])->middleware('user');
 });










