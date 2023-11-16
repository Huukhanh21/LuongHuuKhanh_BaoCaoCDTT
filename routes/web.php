<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductsaleController;
use App\Http\Controllers\backend\ProductstoreController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\ImportController;
use App\Http\Controllers\backend\ConfigController;
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

Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('/productsale',[IndexController::class,'productsale'])->name('productsale');
Route::get('/product',[IndexController::class,'product'])->name('product');
Route::get('/gio-hang',[IndexController::class,'cart'])->name('cart');






Route::middleware(['auth'])->group(function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

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
        Route::get('show/{product}', [ProductController::class, 'show'])->name('product.show');

    });

    Route::get('productsale/trash', [ProductsaleController::class, 'trash'])->name('productsale.trash');
    Route::resource('/productsale', ProductsaleController::class);
    Route::prefix('productsale')->group(function () {
        Route::get('delete/{productsale}', [ProductsaleController::class, 'delete'])->name('productsale.delete');
        Route::get('restore/{productsale}', [ProductsaleController::class, 'restore'])->name('productsale.restore');
        Route::get('status/{productsale}', [ProductsaleController::class, 'status'])->name('productsale.status');
        Route::get('destroy/{productsale}', [ProductsaleController::class, 'destroy'])->name('productsale.destroy');

    });
    
    Route::get('productstore/trash', [ProductstoreController::class, 'trash'])->name('productstore.trash');
    Route::resource('/productstore', ProductstoreController::class);
    Route::prefix('productstore')->group(function () {
        Route::get('delete/{productstore}', [ProductstoreController::class, 'delete'])->name('productstore.delete');
        Route::get('restore/{productstore}', [ProductstoreController::class, 'restore'])->name('productstore.restore');
        Route::get('status/{productstore}', [ProductstoreController::class, 'status'])->name('productstore.status');
        Route::get('destroy/{productstore}', [ProductstoreController::class, 'destroy'])->name('productstore.destroy');

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

    Route::get('menu/trash', [MenuController::class, 'trash'])->name('menu.trash');
    Route::resource('/menu', MenuController::class);
    Route::prefix('menu')->group(function () {
        Route::get('delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
        Route::get('restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
        Route::get('status/{menu}', [MenuController::class, 'status'])->name('menu.status');
        Route::get('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });

    Route::get('order/trash', [OrderController::class, 'trash'])->name('order.trash');
    Route::resource('/order', OrderController::class);
    Route::prefix('order')->group(function () {
        Route::get('delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
        Route::get('restore/{order}', [OrderController::class, 'restore'])->name('order.restore');
        Route::get('status/{order}', [OrderController::class, 'status'])->name('order.status');
        Route::get('destroy/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
        Route::get('show/{order}', [OrderController::class, 'show'])->name('order.show');

    });

    Route::get('post/trash', [PostController::class, 'trash'])->name('post.trash');
    Route::resource('/post', PostController::class);
    Route::prefix('post')->group(function () {
        Route::get('delete/{post}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('restore/{post}', [PostController::class, 'restore'])->name('post.restore');
        Route::get('status/{post}', [PostController::class, 'status'])->name('post.status');
        Route::get('destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });
    
    Route::get('topic/trash', [TopicController::class, 'trash'])->name('topic.trash');
    Route::resource('/topic', TopicController::class);
    Route::prefix('topic')->group(function () {
        Route::get('delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
        Route::get('restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
        Route::get('status/{topic}', [TopicController::class, 'status'])->name('topic.status');
        Route::get('destroy/{topic}', [TopicController::class, 'destroy'])->name('topic.destroy');
    });
    Route::get('page/trash', [PageController::class, 'trash'])->name('page.trash');
    Route::resource('/page', PageController::class);
    Route::prefix('page')->group(function () {
        Route::get('delete/{page}', [PageController::class, 'delete'])->name('page.delete');
        Route::get('restore/{page}', [PageController::class, 'restore'])->name('page.restore');
        Route::get('status/{page}', [PageController::class, 'status'])->name('page.status');
        Route::get('destroy/{page}', [PageController::class, 'destroy'])->name('page.destroy');
    });
    Route::get('user/trash', [UserController::class, 'trash'])->name('user.trash');
    Route::resource('/user', UserController::class);
    Route::prefix('user')->group(function () {
    Route::get('delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('restore/{user}', [UserController::class, 'restore'])->name('user.restore');
    Route::get('status/{user}', [UserController::class, 'status'])->name('user.status');
    Route::get('destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    
    Route::get('customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');
    Route::resource('/customer', CustomerController::class);
    Route::prefix('customer')->group(function () {
    Route::get('delete/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('restore/{customer}', [CustomerController::class, 'restore'])->name('customer.restore');
    Route::get('status/{customer}', [CustomerController::class, 'status'])->name('customer.status');
    Route::get('destroy/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });
    Route::resource('/config', ConfigController::class);
    Route::prefix('config')->group(function () {
    Route::post('createupdate', [ConfigController::class, 'createupdate'])->name('config.createupdate');
    Route::get('status/{config}', [ConfigController::class, 'status'])->name('config.status');
    
    });

    Route::prefix('import')->group(function () {
    Route::get('/', [ImportController::class, 'index'])->name('import.index');
    Route::get('selectproduct', [ImportController::class, 'selectproduct'])->name('import.selectproduct');
    Route::get('storeimport', [ImportController::class, 'storeimport'])->name('import.storeimport');
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



Route::get('{slug}', [IndexController::class,'index'])->name('slug.home');

