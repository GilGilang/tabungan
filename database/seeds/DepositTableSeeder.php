<?php

use Illuminate\Database\Seeder;
use App\Deposit;
use Illuminate\Support\Facades\DB;

class DepositTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deposits')->insert([[
            'name'=> 'BANK MAYORA',
            'time'=> '1',
            'bunga' => '6.38'
        ],
        [
            'name'=> 'BANK CIMB NIAGA',
            'time'=> '1',
            'bunga' => '6.17'
        ],
        [
            'name'=> 'BANK ICBC INDONESIA',
            'time'=> '1',
            'bunga' => '5.75'
        ],[
            'name'=> 'BANK MAYORA',
            'time'=> '3',
            'bunga' => '6.50'
        ],
        [
            'name'=> 'BANK CIMB NIAGA',
            'time'=> '3',
            'bunga' => '6.54'
        ],
        [
            'name'=> 'BANK ICBC INDONESIA',
            'time'=> '3',
            'bunga' => '6.50'
        ],
        [
            'name'=> 'BANK MAYORA',
            'time'=> '6',
            'bunga' => '7'
        ],
        [
            'name'=> 'BANK CIMB NIAGA',
            'time'=> '6',
            'bunga' => '6'
        ],
        [
            'name'=> 'BANK ICBC INDONESIA',
            'time'=> '6',
            'bunga' => '7.25'
        ],
        [
            'name'=> 'BANK MAYORA',
            'time'=> '12',
            'bunga' => '5.9'
        ],
        [
            'name'=> 'BANK CIMB NIAGA',
            'time'=> '12',
            'bunga' => '6.13'
        ],
        [
            'name'=> 'BANK ICBC INDONESIA',
            'time'=> '12',
            'bunga' => '6.50'
        ]]);
    }
}
