<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PapanBungaController;
use App\Http\Controllers\Penjual\TokoController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\TokoController as AdminTokoController;
use App\Http\Controllers\Penjual\PesananController as PenjualPesananController;

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

Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
    Route::resource('/store', AdminTokoController::class);
});

Route::middleware('role:penjual')->prefix('penjual')->group(function () {
    Route::resource('/toko', TokoController::class);
});

Route::resource('/papanbunga', PapanBungaController::class);
Route::resource('/bouquet', BouquetController::class);
// Route::resource('cart', CartController::class);


Route::get('/', [HomeController::class, 'index'])->name('web.home');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{pabung}', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('index.login');
Route::get('/logout', [LoginController::class, 'logout']);

// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/admin/login', [LoginController::class, 'adminLogin']);



// Route::post('/login', [AuthController::class, 'authenticate']);
// Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register', [RegisterController::class, 'index'])->name('index.register');

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::get('/checkout', function () {
//     return view('pages.web.checkout.main');
// });
// Route::get('/toko', function () {
//     return view('pages.web.toko.main');
// });

Route::get('/testimoni', [TestimoniController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout.create');
Route::get('checkout/{checkout}/edit', [CheckoutController::class, 'edit'])->name('checkout.edit');
Route::patch('checkout/{checkout}', [CheckoutController::class, 'update'])->name('checkout.update');
Route::resource('pesanan', PesananController::class);
Route::get('list', [PenjualPesananController::class, 'index'])->name('list-pesanan');
Route::patch('pesan/accept/{checkout}', [PenjualPesananController::class, 'accept'])->name('pesan.accept');
Route::patch('pesan/reject/{checkout}', [PenjualPesananController::class, 'reject'])->name('pesan.reject');
// Route::resource('pesanan', PenjualPesananController::class);
// Route::post('order', [CheckoutController::class, 'order'])->name('order');
Route::post('rating/{papanbunga}', [ReviewController::class, 'store'])->name('rating.store');
