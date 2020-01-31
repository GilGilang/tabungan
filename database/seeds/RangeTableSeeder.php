<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranges')->insert([[
            'data'=>0
        ],
        [
            'data'=>0
        ],
        [
            'data'=>0
        ],
        [
            'data'=>0
        ]
        ]);
    }
}
