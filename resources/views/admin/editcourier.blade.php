@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Edit Courier')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Courier</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ubah Data Courier</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <form method="POST" action="/listcourier/{{ $courier->id }}">
        @method('patch')
        @csrf
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="nama">Nama Courier</label>
              <input type="text" class="form-control @error('courier') is-invalid @enderror" id="nama" placeholder="Ex: JNE" name="courier" value ="{{ $courier->courier }}">
              @error('courier')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
          </div>
        </div>


        <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
    </div>	
  </div>
</div>
@endsection