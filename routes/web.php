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
use App\Http\Controllers\ShuController;
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





Route::post('/lupapassword', [UserController::class, 'sendEmail'])->name('send.email.password')->middleware('guest');

Route::get('/lab/lupa-password/{email}', [UserController::class, 'lupaPassword'])->name('lupa.password.lab')->middleware('guest');
Route::post('/lab/lupa-password', [UserController::class, 'newPassword'])->name('new.password.lab')->middleware('guest');
Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'auth'])->name('login.auth');
Route::get('/login-customer', [CustomerAuthController::class, 'loginCustomer'])->name('login.customer')->middleware('guest');
Route::post('/login-customer', [CustomerAuthController::class, 'authCustomer'])->name('login.customer.store');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [UserController::class, 'register']);
Route::get('/logout-customer', [CustomerAuthController::class, 'logout'])->name('logout.customer')->middleware('auth');
Route::get('/register-customer', [CustomerAuthController::class, 'registerCustomer'])->name('register.customer');
Route::post('/register-customer', [CustomerAuthController::class, 'createCustomer'])->name('register.customer.store');
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/sertifikat-lab', [HomeController::class, 'sertifikat'])->name('sertifikat');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
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

    //order diproses
    Route::get('/', [OrderController::class, 'index'])->name('order.index')->middleware('auth');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail')->middleware('auth');

    // order completed
    Route::get('/pesanan-selesai', [OrderController::class, 'orderCompleted'])->name('order.completed')->middleware('auth');
    Route::get('/pesanan-selesai/{id}', [OrderController::class, 'orderCompletedDetail'])->name('order.completed.detail')->middleware('auth');

    //order cancel
    Route::get('/pesanan-batal', [OrderController::class, 'orderCancel'])->name('order.cancel')->middleware('auth');
    Route::get('/pesanan-batal/{id}', [OrderController::class, 'orderCancelDetail'])->name('order.cancel.detail')->middleware('auth');


    Route::get('/konfirmasi/{id}', [OrderController::class, 'konfirmasi'])->name('order.konfirmasi')->middleware('auth');
    Route::get('/konfirmasi-pembayaran/{id}', [OrderController::class, 'konfirmasiPembayaran'])->name('order.konfirmasi.pembayaran')->middleware('auth');
    Route::get('/batalkan/{id}', [OrderController::class, 'batalkanPesanan'])->name('order.batalkan')->middleware('auth');
});
Route::prefix('analisis')->group(function () {
    Route::get('/', [AnalisisController::class, 'index'])->name('analisis.index')->middleware('auth');
    Route::post('/assign-penguji', [AnalisisController::class, 'assignPenguji'])->name('analisis.assign.penguji')->middleware('auth');
    Route::get('/progres-analisis/{id}', [AnalisisController::class, 'progressAnalisis'])->name('analisis.progres')->middleware('auth');
    Route::get('/konfirmasi-proses-analisis/{id}', [AnalisisController::class, 'konfirmasiProsesAnalisa'])->name('konfirmasi.proses.analisa')->middleware('auth');
    Route::get('/proses-analisis', [AnalisisController::class, 'prosesAnalisis'])->name('proses.analisis')->middleware('auth');
    Route::get('/input-analisis/{id}', [AnalisisController::class, 'inputAnalisis'])->name('input.analisis')->middleware('auth');
    Route::post('/input-analisis', [AnalisisController::class, 'storeInputAnalisis'])->name('store.input.analisis')->middleware('auth');
    Route::get('/validasi-hasil-analisis', [AnalisisController::class, 'listHasilAnalisis'])->name('hasil.analisis')->middleware('auth');
    Route::get('/validasi-hasil-analisis/{id}', [AnalisisController::class, 'detailHasilAnalisis'])->name('detail.hasil.analisis')->middleware('auth');
    Route::post('/validasi-hasil-analisis', [AnalisisController::class, 'validasiHasilAnalisis'])->name('validasi.hasil.analisis')->middleware('auth');
    Route::get('/lolos-validasi/{id}', [AnalisisController::class, 'lolosValidasi'])->name('lolos.validasi')->middleware('auth');
});
Route::prefix('shu')->group(function () {
    Route::get('/', [ShuController::class, 'index'])->name('list.shu')->middleware('auth');
    Route::get('/detail/{id}', [ShuController::class, 'detail'])->name('detail.shu')->middleware('auth');
    // Route::get('/valid', [ShuController::class, 'shuValid'])->name('shu.valid');
    Route::get('/generate-shu/{id}', [ShuController::class, 'generateShu'])->name('generate.shu');
    Route::get('/validasi-shu/{id}', [ShuController::class, 'validasiShu'])->name('validasi.shu')->middleware('auth');
});




Route::prefix('layanan')->group(function () {
    Route::get('/create', [LayananController::class, 'create'])->name('layanan.create')->middleware('auth');
    Route::post('/create', [LayananController::class, 'storeLayanan'])->name('add.layanan')->middleware('auth');
    Route::get('/list', [LayananController::class, 'list'])->name('layanan.list')->middleware('auth');
    Route::get('/create', [LayananController::class, 'create'])->name('layanan.create')->middleware('auth');
    Route::get('/detail/{id}', [LayananController::class, 'detail'])->name('layanan.detail')->middleware('auth');
    Route::post('/edit', [LayananController::class, 'edit'])->name('edit.layanan')->middleware('auth');

    Route::get('/add-parameter', [PengujianController::class, 'formAddParameter'])->name('add.parameter')->middleware('auth');
    Route::post('/add-parameter', [PengujianController::class, 'addParameter'])->name('add.parameter.store')->middleware('auth');
    Route::post('/update-parameter', [PengujianController::class, 'updateParameter'])->name('update.parameter')->middleware('auth');
    Route::get('/get-parameter/{id}', function ($id) {
        $parameter = Pengujian::where('id', $id)->first();
        return response()->json([
            'status' => 200,
            'parameter' => $parameter
        ]);
    })->middleware('auth');
    Route::get('/get-parameters/{id_layanan}', function ($id_layanan) {
        $parameters = Pengujian::where('layanan_id', $id_layanan)->get();
        return response()->json([
            'status' => 200,
            'parameters' => $parameters
        ]);
    })->middleware('auth');

    Route::delete('/delete-parameter', [PengujianController::class, 'deleteParameter'])->name('delete.parameter')->middleware('auth');
    Route::delete('/delete-layanan', [LayananController::class, 'deleteLayanan'])->name('delete.layanan')->middleware('auth');
});

Route::prefix('role')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role.list')->middleware('auth');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create')->middleware('auth');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit.form')->middleware('auth');
    Route::put('/edit', [RoleController::class, 'editStore'])->name('role.edit.store')->middleware('auth');
    Route::put('/edit-password', [RoleController::class, 'editPassword'])->name('role.edit.password')->middleware('auth');
    Route::post('/create', [RoleController::class, 'store'])->name('role.store')->middleware('auth');
    Route::delete('/delete/{id}', [RoleController::class, 'deleteUser'])->name('role.delete')->middleware('auth');
});

Route::prefix('customer')->group(function () {

    Route::post('/lupa-password', [CustomerController::class, 'lupaPassword'])->name('lupa.password');
    Route::get('/lupa-password/{email}', [CustomerController::class, 'formLupaPassword'])->name('lupa.password.route');
    Route::post('/password-baru', [CustomerController::class, 'newPassword'])->name('new.password');
    Route::get('/akun', [CustomerController::class, 'profil'])->name('customer.profil')->middleware('auth');
    Route::post('/akun', [CustomerController::class, 'updateProfil'])->name('customer.profil.edit')->middleware('auth');
    Route::get('/pesanan', [CustomerController::class, 'dataPesanan'])->name('customer.pesanan.index')->middleware('auth');
    Route::post('/ganti-password', [CustomerController::class, 'changePassword'])->name('customer.ganti.password')->middleware('auth');
    Route::get('/pesanan/{id}', [CustomerController::class, 'pesananDetail'])->name('customer.pesanan.detail')->middleware('auth');
});
