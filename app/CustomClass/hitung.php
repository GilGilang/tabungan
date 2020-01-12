<?php
namespace App\CustomClass;

class hitung
{
    var $a;
    var $b;

    function deposit($cek)
    {
        switch($cek)
        {
            case 'datadeposit':
            $hasil = ($this->a/100)*$this->b;
            return $hasil;
            break;

            case 'saldobunga':
            $tambah = $this->a + $this->b;
            return $tambah;
            break;
        }
    }

    function result($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        return $this->deposit($c);
    }
}
