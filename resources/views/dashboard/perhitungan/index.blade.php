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
                <button type="submit" class="btn btn-fill btn-primary save">Save</button>
              </div>
            </div>
          </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('assets/js/jquery.lwMultiSelect.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
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
