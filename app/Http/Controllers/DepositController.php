<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\CustomClass\hitung;

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

    public function deposithitung(Request $request)
    {
        if($request->get('modal')){
            $jumlah = str_replace('.','',$request->get('jumlah'));
            // $waktu = str_replace(' bulan','', $request->get('waktu'));
            $waktu = Deposit::find($request->get('waktu'));
            $bunga = str_replace('%','',$request->get('bunga'));

            $count = new hitung;
            $hitung = $count->result($bunga,$jumlah,'datadeposit');
            $saldobunga = $count->result($hitung,$jumlah,'saldobunga');
            $hitung = "Rp ".number_format($hitung,2,',','.');
            $saldobunga = "Rp ".number_format($saldobunga,2,',','.');
            $jumlah = "Rp ".number_format($jumlah,2,',','.');
            $hasil = [
                'jumlah' => $jumlah,
                'waktu' => $waktu->time,
                'bunga' => $bunga,
                'bank' => $request->get('bank'),
                'hasil' => $hitung,
                'saldobunga'=>$saldobunga
            ];

            return $hasil;
        }
    }
}
