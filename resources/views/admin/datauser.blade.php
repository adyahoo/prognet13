@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Data Users')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data User</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Birthday</th>
              <th>Phone</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->birthday }}</td>
              <td>{{ $user->phone }}</td>
              <td>
                <center>
                  <button type="submit" class="btn btn-primary">Edit</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
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