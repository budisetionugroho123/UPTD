<?php

use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Pengujian;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'auth'])->name('login.auth');
Route::get('/login-customer', [CustomerAuthController::class, 'loginCustomer'])->name('login.customer');
Route::post('/login-customer', [CustomerAuthController::class, 'authCustomer'])->name('login.customer.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register']);
Route::get('/logout-customer', [CustomerAuthController::class, 'logout'])->name('logout.customer');
Route::get('/register-customer', [CustomerAuthController::class, 'registerCustomer'])->name('register.customer');
Route::post('/register-customer', [CustomerAuthController::class, 'createCustomer'])->name('register.customer.store');
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/dashboard', [DashboardController::class, 'index']);
//order layanan
Route::prefix('order-layanan')->group(function () {
    Route::get('/order', [HomeController::class, 'orderLayanan'])->name('order.layanan');
    Route::get('/air-limbah', [HomeController::class, 'orderLayananAirLimbah'])->name('order.layanan');
    Route::get('/air-higiene', [HomeController::class, 'orderLayananAirHigiene'])->name('order.layanan');
    Route::get('/air-permukaan', [HomeController::class, 'orderLayananAirPermukaan'])->name('order.layanan');
    Route::get('/udara-ambien', [HomeController::class, 'orderLayananUdaraAmbien'])->name('order.layanan');
    Route::get('/order/datang-ke-lokasi', [OrderController::class, 'orderToLocation'])->name('order.layanan');
    Route::get('/order/datang-ke-laboratorium', [OrderController::class, 'orderToLab'])->name('order.layanan');
});
Route::prefix('pesanan')->group(function () {
    Route::post('/create-loc', [OrderController::class, 'createOrderLoc'])->name('order.loc.create');
    Route::post('/create-lab', [OrderController::class, 'createOrderLab'])->name('order.lab.create');
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('/konfirmasi/{id}', [OrderController::class, 'konfirmasi'])->name('order.konfirmasi');
    Route::get('/konfirmasi-pembayaran/{id}', [OrderController::class, 'konfirmasiPembayaran'])->name('order.konfirmasi.pembayaran');
    Route::get('/batalkan/{id}', [OrderController::class, 'batalkanPesanan'])->name('order.batalkan');
});
Route::prefix('analisis')->group(function () {
    Route::get('/', [AnalisisController::class, 'index'])->name('analisis.index');
    Route::post('/assign-penguji', [AnalisisController::class, 'assignPenguji'])->name('analisis.assign.penguji');
    Route::get('/progres-analisis/{id}', [AnalisisController::class, 'progressAnalisis'])->name('analisis.progres');
    Route::get('/konfirmasi-proses-analisis/{id}', [AnalisisController::class, 'konfirmasiProsesAnalisa'])->name('konfirmasi.proses.analisa');
    Route::get('/proses-analisis', [AnalisisController::class, 'prosesAnalisis'])->name('proses.analisis');
    Route::get('/input-analisis/{id}', [AnalisisController::class, 'inputAnalisis'])->name('input.analisis');
    Route::post('/input-analisis', [AnalisisController::class, 'storeInputAnalisis'])->name('store.input.analisis');
    Route::get('/validasi-hasil-analisis', [AnalisisController::class, 'listHasilAnalisis'])->name('hasil.analisis');
    Route::get('/validasi-hasil-analisis/{id}', [AnalisisController::class, 'detailHasilAnalisis'])->name('detail.hasil.analisis');
    Route::post('/validasi-hasil-analisis', [AnalisisController::class, 'validasiHasilAnalisis'])->name('validasi.hasil.analisis');
    Route::get('/lolos-validasi/{id}', [AnalisisController::class, 'lolosValidasi'])->name('lolos.validasi');
});
Route::prefix('layanan')->group(function () {
    Route::get('/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/create', [LayananController::class, 'storeLayanan'])->name('add.layanan');
    Route::get('/list', [LayananController::class, 'list'])->name('layanan.list');
    Route::get('/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::get('/detail/{id}', [LayananController::class, 'detail'])->name('layanan.detail');
    Route::post('/edit', [LayananController::class, 'edit'])->name('edit.layanan');

    Route::get('/add-parameter', [PengujianController::class, 'formAddParameter'])->name('add.parameter');
    Route::post('/add-parameter', [PengujianController::class, 'addParameter'])->name('add.parameter.store');
    Route::post('/update-parameter', [PengujianController::class, 'updateParameter'])->name('update.parameter');
    Route::get('/get-parameter/{id}', function ($id) {
        $parameter = Pengujian::where('id', $id)->first();
        return response()->json([
            'status' => 200,
            'parameter' => $parameter
        ]);
    });
    Route::get('/get-parameters/{id_layanan}', function ($id_layanan) {
        $parameters = Pengujian::where('layanan_id', $id_layanan)->get();
        return response()->json([
            'status' => 200,
            'parameters' => $parameters
        ]);
    });

    Route::delete('/delete-parameter', [PengujianController::class, 'deleteParameter'])->name('delete.parameter');
    Route::delete('/delete-layanan', [LayananController::class, 'deleteLayanan'])->name('delete.layanan');
});

Route::prefix('role')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role.list');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit.form');
    Route::put('/edit', [RoleController::class, 'editStore'])->name('role.edit.store');
    Route::put('/edit-password', [RoleController::class, 'editPassword'])->name('role.edit.password');
    Route::post('/create', [RoleController::class, 'store'])->name('role.store');
    Route::delete('/delete/{id}', [RoleController::class, 'deleteUser'])->name('role.delete');
});

Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'dataPesanan'])->name('customer.pesanan.index');
});
