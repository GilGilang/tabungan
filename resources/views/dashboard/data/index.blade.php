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
                        <th>
                            Action
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
                    <td >
                        <a type="button" class="btn btn-sm btn-info">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger deletedata" namadata="{{$row->name}}" data-id={{ $row->id }}>Delete</button>
                      </td>
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
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function(){
    $('.deletedata').on('click', function(){
        var id = $(this).data('id');
        var name = $(this).attr('namadata');
        swal({
            title: "Apa kamu yakin",
            text: "Apa kamu yakin menghapus data deposit dengan nama "+name,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url:'/admin/data/hapus/'+id,
                method:'GET',
                success:function(data){
                    window.setTimeout(function(){window.location.reload()}, 1000);
                }
            });

            }
            });
    });
});
</script>
@endsection
