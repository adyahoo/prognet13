@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Admin's Requests)

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Pesanan Saya</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Pesanan Saya</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Expired</th>
              <th>Address</th>
              <th>Total</th>
              <th>Shipping Cost</th>
              <th>Sub Total</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $trans)
            <input type="hidden" name="trans_id" id="trans_id" value="{{$trans->id}}">
            @if($trans->status == 'unverified')
            <tr>
              <td>{{ $count = $loop->iteration }}</td>
              <td id="kondon_{{$count}}"></td>
              <td>{{$trans->address}}</td>
              <td>{{ $trans->total }}</td>
              <td>{{ $trans->shipping_cost }}</td>
              <td>{{ $trans->sub_total }}</td>
              <td>{{ $trans->status }}</td>
              <td>
                <center>
                  <input id="countdown_{{$count}}" type="hidden" name="countdown_{{$count}}" ></input>
                  <input type="hidden" name="timeout_{{$count}}" id="timeout_{{$count}}" value="{{$trans->timeout}}">
                  <button type="button" class="btn btn-primary btnUpload" data-id="{{$trans->id}}" data-toggle="modal" data-target="#confirmModal">Upload</button>
                  <form action="/pesananuser/{{ $trans->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </center>
              </td>
            </tr>
            @elseif($trans->status == 'canceled' OR $trans->status == 'success' OR $trans->status == 'verified' OR $trans->status == 'expired')
            <tr>
              <td>{{ $count = $loop->iteration }}</td>
              <td>EXPIRED</td>
              <td>{{$trans->address}}</td>
              <td>{{ $trans->total }}</td>
              <td>{{ $trans->shipping_cost }}</td>
              <td>{{ $trans->sub_total }}</td>
              <td>{{ $trans->status }}</td>
              <td>
                <center>
                  <input id="countdown_{{$count}}" type="hidden" name="countdown_{{$count}}" ></input>
                  <input type="hidden" name="created_at_{{$count}}" id="created_at_{{$count}}" value="{{$trans->created_at}}">
                  <input type="hidden" name="timeout_{{$count}}" id="timeout_{{$count}}" value="{{$trans->timeout}}">
                  <button type="button" class="btn btn-primary btnUpload" data-id="{{$trans->id}}" data-toggle="modal" data-target="#confirmModal">Upload</button>
                  <form action="/pesananuser/{{ $trans->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </center>
              </td>
            </tr>
            @endif
            @endforeach
            <input type="hidden" name="counter" id="counter" value="{{$count ?? ''}}">
          </tbody>
        </table><br><br>
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="/pesananuser/konfirmasi" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id_transaksi" id="id_transaksi" value="">
                  <div class="col">
                    <label class="label">Bukti Pembayaran</label>
                    <div class="form-group" >
                      <!-- data-validate = "Profile is required" -->
                      <input class="form-control" type="file" name="proof_of_payment" id="proof_of_payment" placeholder="Product Image">
                      <span class="focus-input100"></span>
                    </div>
                  </div>
                  <br>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- sampe sini -->
      </div>
    </div>
  </div>
  @endsection