<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Range;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.data.index');
    }


    public function bunga()
    {
        $data = Range::select('data')->get();

        $hasil = [];
        $hasil['data']=$data;
       return response()->json($hasil);

    }


}
