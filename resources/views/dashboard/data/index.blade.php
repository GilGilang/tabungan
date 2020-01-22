@extends('dashboard.master')

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Data Perhitungan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                        Jumlah Deposit
                        </th>
                        <th>
                        Bank
                        </th>
                        <th>
                       Waktu
                        </th>
                        <th >
                        Bunga
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                    <?php
                        $jumlah = number_format($row->saldo,2,',','.');
                        $bunga = number_format($row->bunga,2,',','.');
                        $jumlah = str_replace(',00','',$jumlah);
                        $bunga = str_replace(',00','',$bunga);
                    ?>
                  <tr>
                    <td>{{$jumlah}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->time}}</td>
                    <td>{{$bunga}}</td>
                  </tr>
                  @endforeach
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>

        </div>
@endsection
