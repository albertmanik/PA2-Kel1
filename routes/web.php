<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PapanBungaController;
use App\Http\Controllers\Penjual\TokoController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\TokoController as AdminTokoController;
use App\Http\Controllers\Penjual\HomeController as PenjualHomeController;
use App\Http\Controllers\Admin\BouquetController as AdminBouquetController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Penjual\PesananController as PenjualPesananController;
use App\Http\Controllers\Admin\PapanBungaController as AdminPapanBungaController;
use App\Http\Controllers\FAQController;

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

    Route::get('/papanbunga', [AdminPapanBungaController::class, 'index'])->name('admin.papanbunga');
    Route::post('/papanbunga', [AdminPapanBungaController::class, 'store'])->name('admin.papanbunga.store');
    Route::get('/papanbunga/create', [AdminPapanBungaController::class, 'create'])->name('admin.papanbunga.create');
    Route::patch('/papanbunga/{papanbunga}', [AdminPapanBungaController::class, 'update'])->name('admin.papanbunga.update');
    Route::delete('/papanbunga/{papanbunga}', [AdminPapanBungaController::class, 'destroy'])->name('admin.papanbunga.destroy');
    Route::get('/papanbunga/{papanbunga}/edit', [AdminPapanBungaController::class, 'edit'])->name('admin.papanbunga.edit');

    Route::get('/bouquet', [AdminBouquetController::class, 'index'])->name('admin.bouquet');
    Route::post('/bouquet', [AdminBouquetController::class, 'store'])->name('admin.bouquet.store');
    Route::get('/bouquet/create', [AdminBouquetController::class, 'create'])->name('admin.bouquet.create');
    Route::patch('/bouquet/{bouquet}', [AdminBouquetController::class, 'update'])->name('admin.bouquet.update');
    Route::delete('/bouquet/{bouquet}', [AdminBouquetController::class, 'destroy'])->name('admin.bouquet.destroy');
    Route::get('/bouquet/{bouquet}/edit', [AdminBouquetController::class, 'edit'])->name('admin.bouquet.edit');
});

Route::middleware('role:penjual')->prefix('penjual')->group(function () {
    Route::get('/home', [PenjualHomeController::class, 'index'])->name('home');
    Route::resource('/toko', TokoController::class);
    Route::get('pdf', [PenjualPesananController::class, 'pdf'])->name('penjual.pdf');
});

Route::resource('/papanbunga', PapanBungaController::class)->middleware('auth');
Route::resource('/bouquet', BouquetController::class)->middleware('auth');
// Route::resource('cart', CartController::class);


Route::get('/', [HomeController::class, 'index'])->name('web.home');
Route::get('/faq', [FAQController::class, 'index'])->name('web.faq');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{pabung}', [CartController::class, 'store'])->name('cart.store')->middleware('auth');
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
Route::get('list/filter', [PenjualPesananController::class, 'filter'])->name('pesanan.filter');
Route::patch('pesan/accept/{checkout}', [PenjualPesananController::class, 'accept'])->name('pesan.accept');
Route::patch('pesan/reject/{checkout}', [PenjualPesananController::class, 'reject'])->name('pesan.reject');
// Route::resource('pesanan', PenjualPesananController::class);
// Route::post('order', [CheckoutController::class, 'order'])->name('order');
Route::post('rating/{papanbunga}', [ReviewController::class, 'storePapanbunga'])->name('papanbunga.rating');
Route::post('rating/{bouquet}', [ReviewController::class, 'storeBouquet'])->name('bouquet.rating');
Route::get('pdf/{id}', [CheckoutController::class, 'pdf'])->name('pdf');
Route::get('/toko/detail/{toko}', [TokoController::class, 'show'])->name('toko.detail');
