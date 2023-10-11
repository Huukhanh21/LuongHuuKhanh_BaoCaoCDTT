<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\frontend\IndexController;
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

Route::get('/', [IndexController::class,'home'])->name('home');

Route::get('/productsale/{id}',[IndexController::class,'productsale']);
Route::get('/detail',[IndexController::class,'detail'])->name('product.detail');





Route::middleware(['auth'])->group(function () {
Route::get('/admin', [HomeController::class, 'index'])->name('admin');

Route::prefix('admin')->group(function () {
    Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');

    Route::resource('/category', CategoryController::class);
    Route::prefix('category')->group(function () {
        Route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('status/{category}', [CategoryController::class, 'status'])->name('category.status');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        
    });
    
    

    Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::resource('/product', ProductController::class);
    Route::prefix('product')->group(function () {
        Route::get('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        Route::get('status/{product}', [ProductController::class, 'status'])->name('product.status');
        Route::get('destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    });


    Route::get('brand/trash', [BrandController::class, 'trash'])->name('brand.trash');
    Route::resource('/brand', BrandController::class);
    Route::prefix('brand')->group(function () {
        Route::get('delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::get('status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        Route::get('destroy/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
    
    Route::get('contact/trash', [ContactController::class, 'trash'])->name('contact.trash');
    Route::resource('/contact', ContactController::class);
    Route::prefix('contact')->group(function () {
        Route::get('delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');
        Route::get('restore/{contact}', [ContactController::class, 'restore'])->name('contact.restore');
        Route::get('status/{contact}', [ContactController::class, 'status'])->name('contact.status');
        Route::get('destroy/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    });

    Route::get('banner/trash', [BannerController::class, 'trash'])->name('banner.trash');
    Route::resource('/banner', BannerController::class);
    Route::prefix('banner')->group(function () {
        Route::get('delete/{banner}', [BannerController::class, 'delete'])->name('banner.delete');
        Route::get('restore/{banner}', [BannerController::class, 'restore'])->name('banner.restore');
        Route::get('status/{banner}', [BannerController::class, 'status'])->name('banner.status');
        Route::get('destroy/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy');
    });
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
