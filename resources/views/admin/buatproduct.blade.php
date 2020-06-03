@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Create Products')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Create Product</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Buat Product</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <form method="POST" action="/buatproduct" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <div class="form-row ">
            <input type="hidden" name="id" id="id" value="">
            <div class="col">
              <label for="nama">Nama Product</label>
              <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" placeholder="Ex: Apel" name="product_name" value="{{ old('product_name') }}">
              @error('product_name')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
            <div class="col">
              <label for="harga">Harga Product</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Ex: 10000" name="price" value="{{ old('price') }}">
              @error('price')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
          </div>
          <div class="form-row ">
            <div class="col">
              <label for="deskripsi">Deskripsi Product</label>
              <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Ex: Enak Banget" name="description" value="{{ old('description') }}">
              @error('description')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="stock">Stock Product</label>
              <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Ex: 100" name="stock" value="{{ old('stock') }}">
              @error('stock')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
            <div class="col">
              <label for="berat">berat Product</label>
              <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" placeholder="Ex: 1kg " name="weight" value="{{ old('weight') }}">
              @error('weight')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
          </div>
          <div class="col">
            <label class="label">Profil Image</label>
            <div class="form-group" >
              <!-- data-validate = "Profile is required" -->
              <input class="form-control" type="file" name="image_name" id="image_name" placeholder="Product Image">
              <span class="focus-input100"></span>
            </div>
          </div>
          <!-- </div> -->
        </div>


        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>	
  </div>
</div>
@endsection