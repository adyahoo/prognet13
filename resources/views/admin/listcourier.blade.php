@extends('admin/adminLayout.app')

@section('title', 'Freshshop - List Couriers')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Kurir</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Kurir</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Courier Name</th>

              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($couriers as $courier)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $courier->courier }}</td>
              <td>
                <center>
                  <a href="/listcourier/{{ $courier->id }}/edit" class="btn btn-primary">Edit</a>
                  <form action="/listcourier/{{ $courier->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </center>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- sampe sini -->
    </div>
  </div>

</div>
@endsection