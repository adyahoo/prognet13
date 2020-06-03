@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Create Category')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Create Category</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Buat Category</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <form method="POST" action="/buatcategory">
        @csrf
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif
              <label for="nama">Nama Category</label>
              <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="nama" placeholder="Ex: Soft Fruits" name="category_name" >
              @error('category_name')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
          </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>	
  </div>
</div>
@endsection