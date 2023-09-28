<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
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


Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::get('category_trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::prefix('category')->group(function () {
        Route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('status/{category}', [CategoryController::class, 'status'])->name('category.status');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        
    });
    
    
    
    
    Route::resource('/book', BookController::class);
    Route::get('book_trash', [BookController::class, 'trash'])->name('book.trash');
    Route::prefix('book')->group(function () {
        Route::get('delete/{book}', [BookController::class, 'delete'])->name('book.delete');
        Route::get('restore/{book}', [BookController::class, 'restore'])->name('book.restore');
        Route::get('status/{book}', [BookController::class, 'status'])->name('book.status');
        Route::get('destroy/{book}', [BookController::class, 'destroy'])->name('book.destroy');
        
    });
    
    
    
});
