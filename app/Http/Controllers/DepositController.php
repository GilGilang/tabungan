<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\CustomClass\hitung;
use App\Data;
use Auth;
use App\Range;

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


    public function savedata(Request $request)
    {
        if($request->get('simpan')){
            $data = new Data;
            $data->name = $request->get('name');
            $strtotal = str_replace(',00','',str_replace('.','',str_replace('Rp ','',$request->get('total'))));
            $strsaldo = str_replace(',00','',str_replace('.','',str_replace('Rp ','',$request->get('saldo'))));
            $strbunga = str_replace(',00','',str_replace('.','',str_replace('Rp ','',$request->get('bunga'))));
            $data->total = $strtotal;
            $data->saldo = $strsaldo;
            $data->bunga = $strbunga;
            $data->time = $request->get('waktu');
            $data->save();
            if($strsaldo > 0 && $strsaldo <= 100000000 ){
                $status = Data::where('saldo','>','0')->where('saldo','<=','100000000')->count();
                $range = Range::find(1);
                $range->data = $status;
                $range->save();
            }elseif($strsaldo > 100000000 && $strsaldo <= 500000000){
                $range = Range::find(2);
                $status = Data::where('saldo','>','100000000')->where('saldo','<=','500000000')->count();
                $range->data = $status;
                $range->save();
            }elseif($strsaldo > 500000000 && $strsaldo <= 1000000000){
                $range = Range::find(3);
                $status = Data::where('saldo','>','500000000')->where('saldo','<=','1000000000')->count();
                $range->data = $status;
                $range->save();
            }elseif($strsaldo > 1000000000){
                $range = Range::find(4);
                $status = Data::where('saldo','>','1000000000')->count();
                $range->data = $status;
                $range->save();
            }


        }
    }

    public function check()
    {
        $data = Data::where('saldo','>','0')->where('saldo','<=','100000000')->count();

        return $data;
    }
}
