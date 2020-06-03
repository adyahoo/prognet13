@extends('admin/adminLayout.app')

@section('title', 'Freshshop - Response Admin')

@section('content')
<!-- Begin Page Content -->
<div id="app">
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Response Admin</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Response Admin</h6>
    </div>
    <div class="card-body">
      <!-- dari sini -->
      <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Product</th>
              <th>Rating</th>
              <th>Content</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_review as $review)
            <input type="hidden" name="review_id" id="review_id" value="{{$review->id}}">
            <tr>
              <td>{{$count = $loop->iteration }}</td>
              <td>{{$review->user->name}}</td>
              <td>{{$review->product->product_name}}</td>
              <td>
                <star-rating :rating="{{ $review->rating }}" :read-only="true"></star-rating>
              </td>
              <td>{{ $review->content }}</td>
              <td>
                <center>
                  <button type="button" class="btn btn-primary btnResponse" data-user="{{$review->user->id}}" data-admin="{{$admin->id}}" data-id="{{$review->id}}" data-toggle="modal" data-target="#confirmModal">Response</button>
                  <form action="/deleteReview/{{ $review->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">delete</button>
                  </form>
                </center>
              </td>
            </tr>
            @endforeach
            <input type="hidden" name="counter" id="counter" value="{{$count}}">
          </tbody>
        </table><br><br>
        <div class="modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span>&times;</span>
                </button>
              </div>
              <form method="POST" action="/responseadmin" enctype="multipart/form-data">
                <div class="modal-body">
                @csrf
                <input type="hidden" name="id_review" id="id_review" value="">
                <input type="hidden" name="id_admin" id="id_admin" value="">
                <input type="hidden" name="id_user" id="id_user" value="">
                <label class="control-label">Response</label>
                <input type="text" name="content" id="content" class="form-control" placeholder="Write Response">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Post Response</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
        <!-- sampe sini -->
    </div>
  </div>
</div>
@endsection