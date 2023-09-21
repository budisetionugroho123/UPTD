<?php

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
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register']);
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
    Route::post('/create', [OrderController::class, 'createOrderLoc'])->name('order.lab.create');
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
