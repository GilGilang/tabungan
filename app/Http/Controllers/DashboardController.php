<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.data.index');
    }


    public function bunga()
    {
        $data = Data::select('bunga')->get();
        $hasil = [];
        $hasil['data']=$data;
       return response()->json($hasil);

    }


}
