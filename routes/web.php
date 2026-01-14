<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminLogController;
use App\Http\Controllers\AdminDashboardController as ControllersAdminDashboardController;
use App\Http\Controllers\AdminLogController as ControllersAdminLogController;
use App\Http\Controllers\AdminOrderController as ControllersAdminOrderController;
use App\Http\Controllers\AdminProductController as ControllersAdminProductController;
use App\Http\Controllers\AdminUserController as ControllersAdminUserController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('landing'))->name('landing');
Route::get('/about', fn () => view('about'))->name('about');


/*
|--------------------------------------------------------------------------
| CUSTOMER (USER)
|--------------------------------------------------------------------------
*/

Route::get('/home', fn () => view('user.home'))->name('home');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

    Route::get('/product/{name}', function ($name) {

    $products = [
        ['name'=>'Beras Ramos 5kg','price'=>75000,'img'=>'rice','stock'=>50,'desc'=>'Beras kualitas premium, pulen dan wangi.'],
        ['name'=>'Minyak Goreng 2L','price'=>38000,'img'=>'oil','stock'=>40,'desc'=>'Minyak goreng jernih, cocok untuk usaha gorengan.'],
        ['name'=>'Telur Ayam 1kg','price'=>29000,'img'=>'egg','stock'=>100,'desc'=>'Telur ayam segar langsung dari peternak.'],
        ['name'=>'Gula Pasir 1kg','price'=>15000,'img'=>'sugar','stock'=>70,'desc'=>'Gula pasir putih bersih dan manis.'],
    ];

    $product = collect($products)->firstWhere('name', urldecode($name));

    abort_if(!$product, 404);

    return view('/user/product-detail', compact('product'));
});



Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/remove', [CartController::class, 'remove']);



/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::get('/register', fn () => view('auth.register'))->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL (SUPER ADMIN / KASIR)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [ControllersAdminDashboardController::class,'index'])->name('dashboard');

    Route::resource('/products', ControllersAdminProductController::class);
    Route::get('/orders', [ControllersAdminOrderController::class,'index'])->name('orders.index');
    Route::get('/users', [ControllersAdminUserController::class,'index'])->name('users.index');
});

