@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Create Couriers')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Create Courier</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Buat Courier</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <form method="POST" action="/buatcourier">
        @csrf
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
              <label for="nama">Nama Courier</label>
              <input type="text" class="form-control @error('courier') is-invalid @enderror" id="nama" placeholder="Ex: JNE" name="courier" >
              @error('courier')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
          </div>
        </div>


        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>	
  </div>
</div>
@endsection