<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;

class DepositController extends Controller
{
    public function index()
    {
        $data = Deposit::select('name')->groupBy('name')->get();
        return view('dashboard.perhitungan.index',['data'=>$data]);
    }


    public function fetch(Request $request)
    {
        $result = '';
        if($request->get('bank')){
            $data = Deposit::all()->where('name',$request->get('name'));

            foreach($data as $row){
                $result .= '<option value="'.$row->id.'">'.$row->time. ' bulan </option>';
            }

        }
        echo $result;
    }

    public function fetchbunga(Request $request)
    {
        if($request->get('time')){
            $data = Deposit::find($request->get('data'));

            echo $data->bunga;
        }
    }
}
