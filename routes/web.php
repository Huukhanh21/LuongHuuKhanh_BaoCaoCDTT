<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\IndexController;
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
    return view('homefront');
});
Route::get('/product/{id}',[ IndexController::class,'product']);



Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('admin');

Route::prefix('admin')->group(function () {
    Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');

    Route::resource('/category', CategoryController::class);
    Route::prefix('category')->group(function () {
        Route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('status/{category}', [CategoryController::class, 'status'])->name('category.status');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        
    });
    
    
    
    Route::get('book/trash', [BookController::class, 'trash'])->name('book.trash');
    Route::resource('/book', BookController::class);
    Route::prefix('book')->group(function () {
        Route::get('delete/{book}', [BookController::class, 'delete'])->name('book.delete');
        Route::get('delete/{book}', [BookController::class, 'delete'])->name('book.delete');
        Route::get('restore/{book}', [BookController::class, 'restore'])->name('book.restore');
        Route::get('status/{book}', [BookController::class, 'status'])->name('book.status');
        Route::get('destroy/{book}', [BookController::class, 'destroy'])->name('book.destroy');
        
    });


    Route::get('brand/trash', [BrandController::class, 'trash'])->name('brand.trash');
    Route::resource('/brand', BrandController::class);
    Route::prefix('brand')->group(function () {
        Route::get('delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::get('status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        Route::get('destroy/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
        
    });
    
    
    
});
