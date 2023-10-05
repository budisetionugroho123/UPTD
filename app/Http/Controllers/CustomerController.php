<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function dataPesanan()
    {
        return view('home-landing.customer.pesanan');
    }
}
