<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\MainController;

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
//backend

Route::prefix('admin')->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');
        
        //quan ly danh muc san pham
        Route::prefix('category')->group(function()
        {
            Route::get('/',[CategoryController::class,'index'])->name('category.index');
            Route::get('/create',[CategoryController::class,'create'])->name('category.create');
            Route::get('/edit',[CategoryController::class,'edit'])->name('category.edit');
            Route::get('/delete',[CategoryController::class,'delete'])->name('category.delete');
            Route::get('category_trash',[CategoryController::class,'trash'])->name('category.trash');
            //category
            Route::resource('category', CategoryController::class);
            Route::prefix('category')->group(function(){
                Route::get('status/{category}',[CategoryController::class,'status'])->name('category.status');
                Route::get('delete/{category}',[CategoryController::class,'delete'])->name('category.delete');
                Route::get('restore/{category}',[CategoryController::class,'restore'])->name('category.restore');
                Route::get('destroy/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
            });         
        });
        
        //quan ly san pham
        Route::prefix('product')->group(function()
        {
            Route::get('/',[ProductController::class,'index'])->name('product.index');
            Route::get('/trash',[ProductController::class,'trash'])->name('product.trash');
            Route::get('/insert',[ProductController::class,'insert'])->name('product.insert');
            Route::get('/update',[ProductController::class,'update'])->name('product.update');
        });
        //quan li users
        Route::prefix('login')->group(function()
        {
            Route::get('/',[LoginController::class,'index'])->name('login.index');
            Route::post('/store',[LoginController::class,'store'])->name('login.store');
        });
    }
);