@extends('user/userLayout.app')

@section('title', 'Freshshop - Cart User')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Cart</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Cart</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($carts as $cart)
            @if($cart->status == 'notyet')
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$cart->product->product_name}}</td>
              <td>{{$cart->product->price}}</td>
              <td>{{$cart->qty}}</td>
              <td>{{$cart->product->price * $cart->qty}}</td>
              <td>
                <center>
                  <a href="#" data-target="#editcartModal" data-toggle="modal" class="btn btn-primary">Edit</a>
                  <form action="/cartuser/{{ $cart->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </center>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
        <br>
        <button type="button" data-toggle="modal" data-target="#buycartModal" class="btn btn-primary">Buy</button>
      </div>
      <div class="modal fade" id="buycartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buy Cart</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="/cartuser" enctype="multipart/form-data">
                @csrf 
                <div class="col">
                  <label for="province">Province</label>
                  <select name="province_to" class="form-control">
                    <option value="" holder>Pilih Provinsi Tujuan</option>
                    @foreach($provinsi as $province)
                    <option value="{{$province->id}}">{{$province->province}}</option>
                    @endforeach
                  </select>
                </div> 
                <div class="col">
                  <label for="regency">Regency</label>
                  <select name="destination" class="form-control">
                    <option value="" holder>Pilih Kota Tujuan</option>
                  </select>
                </div>
                <div class="col">
                  <label for="address">Address</label>
                  <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Ex: Jl. Kampus Unud No.1" name="address">
                  @error('address')<div class="invalid-feedback"> {{ $message }}</div> @enderror
                </div>        
                <div class="col">
                  <div class="form-group">
                    <label for="courier">Courier</label>
                    <select class="form-control @error('courier') is-invalid @enderror" id="courier" placeholder="Nothing " name="courier">
                      @foreach($couriers as $courier)
                      <option value="{{ $courier->id}}">{{ $courier->courier }}</option>     
                      @endforeach
                      @error('courier')<div class="invalid-feedback"> {{ $message }}</div> @enderror
                    </select>	
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Buy</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
        @endsection