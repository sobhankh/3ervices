<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUser;

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


Route::prefix('control')->middleware(['auth.user'])->group(function (){
    Route::get('',[\App\Http\Controllers\Admin\AdminControoler::class,'index'])->middleware(['auth.user'])->name('admin');
    Route::resource('register',\App\Http\Controllers\Admin\RegisterService::class);
    Route::get('register/status/{id}',[\App\Http\Controllers\Admin\RegisterService::class,'status'])->name('set.status');
    Route::get('genrate/city/{service}',[\App\Http\Controllers\Admin\GenrateService::class,'index'])->name('genrate.view');
    Route::post('genrate/city/{service}',[\App\Http\Controllers\Admin\GenrateService::class,'store'])->name('genrate.store');
    Route::get('mangment/city/{id}',[\App\Http\Controllers\Admin\GenrateService::class,'edit'])->name('mangment.edit');
    Route::post('mangment/city/{id}',[\App\Http\Controllers\Admin\GenrateService::class,'update'])->name('mangment.update');
    Route::post('get/city',[\App\Http\Controllers\Admin\GenrateService::class,'getCity'])->name('get.city');
    Route::resource('information/services',\App\Http\Controllers\Admin\InformationService::class);
    Route::resource('menus',\App\Http\Controllers\Admin\MenoServices::class);
    Route::get('blog/{id}',[\App\Http\Controllers\Admin\BlogController::class,'index'])->name('blog.index');
    Route::get('blog/create/{id}',[\App\Http\Controllers\Admin\BlogController::class,'create'])->name('blog.create');
    Route::post('blog/store',[\App\Http\Controllers\Admin\BlogController::class,'store'])->name('blog.store');
    Route::get('blog/edit/{id}',[\App\Http\Controllers\Admin\BlogController::class,'edit'])->name('blog.edit');
    Route::put('blog/update/{id}',[\App\Http\Controllers\Admin\BlogController::class,'update'])->name('blog.update');
    Route::delete('blog/destory/{id}',[\App\Http\Controllers\Admin\BlogController::class,'destroy'])->name('blog.destroy');
    Route::get('blog/status/{id}',[\App\Http\Controllers\Admin\BlogController::class,'status'])->name('blog.status');
    Route::resource('user',\App\Http\Controllers\Admin\UserController::class);
});



