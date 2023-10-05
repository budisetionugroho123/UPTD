<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $this->authorize('login');
        return view('dashboard.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
