<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function pasienDashboard()
    {
        return view('pasien.dashboard', ['user' => Auth::user()]);
    }

    public function dokterDashboard()
    {
        return view('dokter.dashboard', ['user' => Auth::user()]);
    }
}
