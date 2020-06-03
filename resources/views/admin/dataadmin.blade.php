@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Data Admins')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($admins as $admin)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $admin->first_name }}</td>
              <td>{{ $admin->last_name }}</td>
              <td>{{ $admin->username }}</td>
              <td>{{ $admin->email }}</td>
              <td>{{ $admin->phone }}</td>
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
