<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.data.index');
    }


    public function perhitungan()
    {
        return view('dashboard.perhitungan.index');
    }
}
