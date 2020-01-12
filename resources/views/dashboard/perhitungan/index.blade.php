@extends('dashboard.master')

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Perhitungan</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-3 ">
                      <div class="form-group">
                        <label>Jumlah Deposit</label>
                        <input type="text" id="jumlah" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                            <label  for="bank">Bank</label>
                          <select style="color:orange;" class="custom-select" id="bank">
                            <option selected>Choose...</option>
                           @foreach($data as $row)
                          <option value="{{ $row->name }}">{{ $row->name }}</option>
                           @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="form-group">
                            <label  for="waktu">Jangka Waktu</label>
                              <select style="color:orange;" class="custom-select" id="waktu">
                                <option selected>Choose...</option>

                              </select>
                        </div>
                      </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                        <label for="bunga">Suku Bunga Efektif</label>
                        <input type="text" class="form-control" style="color: white;" disabled id="bunga">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary save">Hitung</button>
              </div>
            </div>
          </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="col-12 modal-title text-center" id="exampleModalLabel">Deposit</h3>

        </div>
        <div class="modal-body">
         <form action="">

            <table class="profit-loss report-table table" id="date-profit-lost">

                <tbody >
                    <tr>
                        <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                            <p class="text-dark ">Nama Bank</p>
                          </td>
                          <td class="report-subtotal text-right" id="assets-type-1-total-data">
                          </td>
                          <td class="border-top-thin"  style="padding-left:80px;">
                            <p class="text-dark" id="namabank"> </p>
                          </td>
                   </tr>
                        <tr >
                              <td  class="report-subtotal text-left regular-text data-col-half" colspan="2">
                                <p class="text-dark ">Bunga + Saldo</p>
                                </td>
                                <td class="report-subtotal text-right" id="assets-type-1-total-data">
                                </td>
                                <td class="border-top-thin" name="hasilnama" style="padding-left:80px;">
                                    <p class="text-dark" id="bungadansaldo"> </p>
                                </td>
                         </tr>
                           <tr>
                                <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                                    <p class="text-dark ">Saldo</p>
                                  </td>
                                  <td class="report-subtotal text-right" id="assets-type-1-total-data">
                                  </td>
                                  <td class="border-top-thin"  style="padding-left:80px;">
                                    <p class="text-dark" id="saldosaja"> </p>
                                  </td>
                           </tr>
                           <tr>
                                <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                                    <p class="text-dark ">Bunga</p>
                                  </td>
                                  <td class="report-subtotal text-right" id="assets-type-1-total-data">
                                  </td>
                                  <td class="border-top-thin"  style="padding-left:80px;">
                                    <p class="text-dark " id="bungasaja"></p>
                                  </td>
                           </tr>


                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.lwMultiSelect.js')}}"></script>
<script src="{{asset('assets/js/jquery.mask.js')}}"></script>
<script>
$(document).ready(function(){
    $('#bank').on('change', function(){
        var bank = $(this).val();
        ajax();
        $.ajax({
            url:'/admin/perhitungan/fetch',
            method:'POST',
            data:{
                'bank':1,
                'name':bank},
            success:function(response){
               $('#waktu').html(response);

            }
        });
    });

    $('#waktu').on('change', function(){
        var data = $(this).val();
        $.ajax({
            url:'/admin/perhitungan/fetchbunga',
            method:'POST',
            data:{'time':1,
                'data':data
            },
            success:function(response){
                $('#bunga').val(response+'%');
            }
        });
    });


    $('.save').on('click', function(){
        $('#exampleModal').modal('show');
        var jumlah = $('#jumlah').val();
        var bank = $('#bank').val();
        var waktu = $('#waktu').val();
        var bunga = $('#bunga').val();

        ajax();
        $.ajax({
            url:'/admin/perhitungan/deposit',
            method:'POST',
            data: {
                    'modal':1,
                    'jumlah':jumlah,
                    'bank':bank,
                    'waktu':waktu,
                    'bunga':bunga

            }, success:function(response){
               $('#namabank').text(response['bank']);
               $('#bungadansaldo').text(response['saldobunga']);
               $('#saldosaja').text(response['jumlah']);
               $('#bungasaja').text(response['hasil']);
            }
        });
    });

});

function ajax(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
}
$( '#jumlah' ).mask('000.000.000.000', {reverse: true});

</script>
@endsection
