<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $this->authorize('login');
        $countPesananCompleted = Pesanan::where('status_pesanan', 'pengesahan_shu_selesai')->count();
        $countPesananCancel = Pesanan::where('status_pesanan', 'pesanan_dibatalkan')->count();
        $countAllOrder = Pesanan::count();

        $data = [
            'orderComplete' => $countPesananCompleted,
            'orderCancel' => $countPesananCancel,
            'allOrders' => $countAllOrder
        ];
        $customers = Pesanan::all()->unique('nama_perusahaan');
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'data' => $data,
            'customers' => $customers
        ]);
    }
}
