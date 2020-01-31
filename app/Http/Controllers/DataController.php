<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();
        return view('dashboard.data.index',['data'=>$data]);
    }

    public function delete($id)
    {
        $data = Data::find($id)->delete();
        echo $data;
    }
}
