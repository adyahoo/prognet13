@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Edit Category')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit Category</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ubah Data Category</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <form method="POST" action="/listcategory/{{ $category->id }}">
        @method('patch')
        @csrf
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="nama">Nama Category</label>
              <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="nama" placeholder="Ex: Soft Fruits" name="category_name" value ="{{ $category->category_name }}">
              @error('category_name')<div class="invalid-feedback"> {{ $message }}</div> @enderror
            </div>
          </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
    </div>	
  </div>
</div>
@endsection