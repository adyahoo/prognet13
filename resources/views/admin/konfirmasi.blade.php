@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Konfirmasi Pesanan')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Konfirmasi Pesanan</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pesanan</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Total</th>
              <th>Courier</th>
              <th>Created At</th>
              <th>Proof of Payment</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $trans)
            <input type="hidden" name="trans_id" id="trans_id" value="{{$trans->id}}">
            <tr>
              <td>{{$count = $loop->iteration }}</td>
              <td>{{$trans->user->name}}</td>
              <td>{{$trans->sub_total}}</td>
              <td>{{ $trans->courier->courier }}</td>
              <td>{{ $trans->created_at }}</td>
              <td>
                <center>
                  @if($trans->proof_of_payment == null)
                    <img id="imageProof_{{$trans->id}}" src="" style="width:100px;height:100px" alt="Proof of Payment_{{$count}}">
                  @else
                    <img id="imageProof_{{$trans->id}}" src="{{url('/fresh/images/proof/'.$trans->proof_of_payment)}}" style="width:100px;height:100px" alt="Proof of Payment_{{$count}}">
                  @endif
                </center>
              </td>
              <td>{{ $trans->status }}</td>
              <td>
                <center>
                  <button type="button" class="btn btn-primary btnDetail" data-iteration="{{$loop->iteration}}" data-id="{{$trans->id}}" data-toggle="modal" data-target="#confirmModal">Detail</button>
                  <form action="/declineAdmin/{{ $trans->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Decline</button>
                  </form>
                </center>
              </td>
            </tr>
            @endforeach
            <input type="hidden" name="counter" id="counter" value="{{$count}}">
          </tbody>
        </table><br><br>
        <div class="modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span>&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="/approveAdmin" enctype="multipart/form-data">
              @csrf
                <input type="hidden" name="id_transaction" id="id_transaction" value="">
                <center>
                  <img class="modal-content" id="proof1" style="width:400px;height:400px">
                  <div id="caption"></div>
                </center>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
        <!-- sampe sini -->
    </div>
  </div>
</div>
@endsection