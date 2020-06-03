@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Dashboard Admin')

@section('content')
<!-- Begin Page Content -->
<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Dashboard Admin</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Tahunan</h6>
    </div>
    <div class="card-header">
      <select class="custom-select" name="tahun" id="tahun">
        @for($i = 2019; $i <= date('Y'); $i++)
          <option value="{{$i}}" @if($i==date('Y')) selected @endif >{{$i}}</option>
        @endfor
      </select>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Jumlah Transaksi</th>
              <th>Unverified</th>
              <th>Expired</th>
              <th>Success</th>
              <th>Cancelled</th>
              <th>Verified</th>
              <th>Total Penghasilan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="total_tahun">{{$status_tahun['total']}}</td>
              <td id="unverified_tahun">{{$status_tahun['unverified']}}</td>
              <td id="expired_tahun">{{$status_tahun['expired']}}</td>
              <td id="success_tahun">{{$status_tahun['success']}}</td>
              <td id="cancelled_tahun">{{$status_tahun['cancelled']}}</td>
              <td id="verified_tahun">{{$status_tahun['verified']}}</td>
              <td id="harga_tahun">Rp. {{$status_tahun['harga']}}</td>
            </tr>
          </tbody>
        </table><br><br>
      </div>
        <!-- sampe sini -->
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Bulanan</h6>
    </div>
    <div class="card-header">
      <select class="custom-select" name="bulan" id="bulan">
        <option value="1" @if(date('m')==1) selected @endif>Januari</option>
        <option value="2" @if(date('m')==2) selected @endif>Februari</option>
        <option value="3" @if(date('m')==3) selected @endif>Maret</option>
        <option value="4" @if(date('m')==4) selected @endif>April</option>
        <option value="5" @if(date('m')==5) selected @endif>Mei</option>
        <option value="6" @if(date('m')==6) selected @endif>Juni</option>
        <option value="7" @if(date('m')==7) selected @endif>Juli</option>
        <option value="8" @if(date('m')==8) selected @endif>Agustus</option>
        <option value="9" @if(date('m')==9) selected @endif>September</option>
        <option value="10" @if(date('m')==10) selected @endif>Oktober</option>
        <option value="11" @if(date('m')==11) selected @endif>November</option>
        <option value="12" @if(date('m')==12) selected @endif>Desember</option>
      </select>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Jumlah Transaksi</th>
              <th>Unverified</th>
              <th>Expired</th>
              <th>Success</th>
              <th>Cancelled</th>
              <th>Verified</th>
              <th>Total Penghasilan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="total">{{$status['total']}}</td>
              <td id="unverified">{{$status['unverified']}}</td>
              <td id="expired">{{$status['expired']}}</td>
              <td id="success">{{$status['success']}}</td>
              <td id="cancelled">{{$status['cancelled']}}</td>
              <td id="verified">{{$status['verified']}}</td>
              <td id="harga">Rp. {{$status['harga']}}</td>
            </tr>
          </tbody>
        </table><br><br>
      </div>
        <!-- sampe sini -->
    </div>
  </div>
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
    </div>
    <div class="card-header">
      <button class="btn btn-info status" id="all">All</button>
      <button class="btn btn-info status" id="unverified">unverified</button>
      <button class="btn btn-info status" id="expired">expired</button>
      <button class="btn btn-info status" id="success">success</button>
      <button class="btn btn-info status" id="cancelled">cancelled</button>
      <button class="btn btn-info status" id="verified">verified</button>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
      <!-- sampe sini -->
    </div>
  </div>
</div>
@endsection