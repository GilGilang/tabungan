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
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                            <label  for="bank">Bank</label>
                          <select class="custom-select" id="bank">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="form-group">
                            <label  for="waktu">Jangka Waktu</label>
                              <select class="custom-select" id="waktu">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                      </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                        <label for="bunga">Suku Bunga Efektif</label>
                        <input type="text" class="form-control" disabled id="bunga">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Save</button>
              </div>
            </div>
          </div>

        </div>
@endsection
