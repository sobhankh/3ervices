<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Blog;
use App\Models\NameService;
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

Route::get('/', function () {
    $service = NameService::all()->where('status',1)->where('is_generate',1)->where('is_setting',1);
    $forward = [];

    foreach ($service as $key => $value) {
        $info = \App\Models\InfoService::where('service_id',$value['id'])->first();

        $forward[$key]['img'] = $info['city_img'];
        $forward[$key]['title'] = $value['title'];
        $forward[$key]['slug'] = $value['slug'];
    }

    return view('welcome',compact('forward'));

})->name('index');

Route::get('/sitemap',function(){
    $Service = Service::all();
    return response()->view('sitemap',compact('Service'))->header('Content-Type', 'text/xml');
});

Route::get('/blog/sitemap',function(){
   
    $blog = Blog::all()->where('status',1);
    $blogs = [];

    foreach($blog as $key => $value){
        $id = NameService::find($value['name_services_id']);
        $blogs[$key]['slug'] = $id['slug'];
        $blogs[$key]['id'] = $value['id'];
    }
    return response()->view('blog-sitemap',compact('blogs'))->header('Content-Type', 'text/xml');
});

Route::get('auth/{password}',[\App\Http\Controllers\Admin\AuthController::class,'index'])->name('auth');
Route::post('auth/login',[\App\Http\Controllers\Admin\AuthController::class,'login'])->name('login');
require_once __DIR__ .'/AdminRoute/route.php';

Route::prefix('/{id}')->group(function (){
    Route::get('/',[\App\Http\Controllers\Client\HomeController::class,'index'])->name('home.index');
    Route::get('/category/{cat}',[\App\Http\Controllers\Client\HomeController::class,'categories'])->name('home.category');
    Route::get('/blog/{blog}',[\App\Http\Controllers\Client\HomeController::class,'showBlog'])->name('home.blog');
    Route::get('/city/{city}',[\App\Http\Controllers\Client\HomeController::class,'showCity'])->name('home.city');
});



