@extends('layout.app')

@section('title', 'Freshshop - Product Detail')

@section('content')

<div class="shop-detail-box-main">
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{$product->getImage()}}" alt="First slide"> </div>
                            <!-- <div class="carousel-item"> <img class="d-block w-100" src="fresh/images/big-img-02.jpg" alt="Second slide"> </div>
                                <div class="carousel-item"> <img class="d-block w-100" src="fresh/images/big-img-03.jpg" alt="Third slide"> </div> -->
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
                              <i class="fa fa-angle-left" aria-hidden="true"></i>
                              <span class="sr-only">Previous</span> 
                          </a>
                          <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
                              <i class="fa fa-angle-right" aria-hidden="true"></i> 
                              <span class="sr-only">Next</span> 
                          </a>
                          <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{$product->getImage()}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="fresh/images/smp-img-02.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="fresh/images/smp-img-03.jpg" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $product->product_name }}</h2>
                        <h5> <del>Rp. 100000</del>Rp. {{ $product->price }}/kg</h5>
                        <p class="available-stock"><span> More than {{ $product->stock }} available / <a href="#">8 sold </a></span><p>
                          <h4>Short Description:</h4>
                          <p>{{ $product->description }} </p>
                          

                          <div class="price-box-bar">
                           <div class="cart-and-bay-btn">
                            <a class="btn hvr-hover" data-toggle="modal" data-target="#buyModal" data-fancybox-close="" href="#">Buy</a>
                            <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Buy Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id}}"> 
                                                <input type="hidden" id="price" name="price" value="{{ $product->price}}"> 
                                                <div class="col">
                                                    <label for="province">Province</label>
                                                    <select name="province_to" class="form-control">
                                                        <option value="" holder>Pilih Provinsi Tujuan</option>
                                                        @foreach($provinces as $province)
                                                        <option value="{{$province->id}}">{{$province->province}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="regency">Regency</label>
                                                    <select name="destination" class="form-control">
                                                        <option value="" holder>Pilih Kota Tujuan</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Ex: Jl. Kampus Unud No.1" name="address">
                                                    @error('address')<div class="invalid-feedback"> {{ $message }}</div> @enderror
                                                </div>                                                
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="courier">Courier</label>
                                                        <select class="form-control @error('courier') is-invalid @enderror" id="courier" placeholder="Nothing " name="courier">
                                                            @foreach($courier as $courier)
                                                            <option value="{{ $courier->id}}">{{ $courier->courier }}</option>
                                                            @endforeach
                                                            @error('courier')<div class="invalid-feedback"> {{ $message }}</div> @enderror
                                                        </select>   
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col">
                                                    <ul>
                                                        <li>
                                                            <div class="form-group quantity-box">
                                                                <label class="control-label">Quantity</label>
                                                                <input class="form-control" id="qty" name="qty" placeholder="0" min="0" max="20" type="number">                                                                
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Buy</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn hvr-hover" data-toggle="modal" data-target="#cartModal" data-fancybox-close="" href="#">Add to cart</a>
                        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add to Cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                    <form method="POST" action="/products/{{$product->id}}/cart" enctype="multipart/form-data">
                                        @csrf
                                        <br>
                                        <input type="hidden" id="id_product" name="id_product" value="{{ $product->id}}">
                                        <div class="col">
                                            <ul>
                                                <li>
                                                    <div class="form-group quantity-box">
                                                        <label class="control-label">Quantity</label>
                                                        <input class="form-control" id="qty" name="qty" placeholder="0" min="0" max="20" type="number">

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Add to Cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="add-to-btn">
               <div class="add-comp">
                <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
            </div>
            <div class="share-bar">
                <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row my-5">
</div>
<div class="row my-5">
    <div class="card card-outline-secondary my-4">
     <div class="card-header">
      <h2>Product Reviews</h2>
      <star-rating :rating="{{$product->getStar()}}" :read-only="true" :increment="0.5"></star-rating>
  </div>
  <div class="card-body">
    <div class="media mb-3">
        <div class="media-body">
            <ul>
                @foreach($all_review as $review)
                <div class="media mb-2">
                    <star-rating :star-size=20 :rating="{{$review->rating}}" :read-only="true" :show-rating="false"></star-rating>
                    <h4>{{$review->user->name}}</h4>
                </div>
                <h2>{{$review->content}}</h2>
                <div class="card-body">
                    Reply :
                    <br>
                    @foreach($all_respon as $respon)
                        @if($respon->review_id == $review->id)
                            {{$respon->content}}
                            <br>
                        @else
                        @endif
                    @endforeach
                </div>
                <br>
                @endforeach    
            </ul>
        </div>
    </div>
    @if($userName!="")
        <a href="#" data-toggle="modal" data-target="#ratingModal" class="btn hvr-hover">Leave a Review</a>
    @else
        <a href="/userLogin" class="btn hvr-hover">Leave a Review</a>
    @endif
</div>
</div>
</div>

<div class="row my-5">
    <div class="col-lg-12">
        <div class="title-all text-center">
            <h1>Featured Products</h1>
        </div>
    </div>
</div>
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" data-reveal>
              <review-form :product="{{$product}}"
              url="{{route('postRating.store')}}"></review-form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
