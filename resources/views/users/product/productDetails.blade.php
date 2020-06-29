@extends('users.layout.layout')
@section('title', 'Product Details')
@section('content')
<!-- Product Title: Peoduct Details -->
<div class="hero hero-page padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 ">
                <h1>Product Details</h1>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Product Details -->
<div class="container product_details py-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-lg-6">
            <div class="product-slider">
                <div class="demo">
                    <div class="item d-flex justify-content-center">
                        <div class="clearfix " style="width:70%; height: auto;">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                @foreach( $gallery as $gallery)
                                <li data-thumb="{{asset("img/gallery/$gallery->product_gallery")}}">
                                    <img src="{{asset("img/gallery/$gallery->product_gallery")}}" class="rounded mx-auto d-block" />
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Info-->
        <div class="col-lg-6">
            <div class="row">
                <p class="product_cate"><a href="#">{{$category->category_name}}</a></p>
            </div>
            <div class="row">
                <p class="product_name">{{$product->product_title}}</p>
            </div>
            <div class="row">
                <p class="product_price">{{$product->price}}</p>
            </div>
            <div class="row">
                <p class="product_description">{{$product->short_descriptions}}</p>
            </div>

            {{--Form Cart--}}
            <form action="{{url('cart/addCart/'.$product->id)}}" method="POST">
                @csrf
            <div class="row d-flex justify-content-around align-items-center py-4">
                <div class=" col-md-3 quantity d-flex align-items-center justify-content-center">
                    <button type="button" class="dec-btn"  onclick="decre()" >-</button>
                    <input type="number" id="1" value="{{$quantity}}" name="quantityNumber" min="1" class="quantity-no rounded" >
                    <button type="button" class="inc-btn"  onclick="incre()" >+</button>
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-dark wide btn-md btn-block"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </form>
            {{--End Form--}}
            {{--Form--}}
            <form action="{{url('cart/shopping')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="idProduct" value="{{$product->id}}">
                <input type="number" id="2" name="addQuantity" style="display:none" min="1" value="{{$quantity}}">
                    <button type="submit" class="btn btn-success wide btn-md btn-block"><b>Buy Now</b></button>
                
            </form>
                {{--End Form--}}
            </div>
            

            <div class="row">
                <div class="col-lg-6 py-3">
                    <h6 class="text-uppercase"><i class="fas fa-truck"></i> SHIPPING & DELIVERY</h6>
                    <ul class="list-unstyled list-detail-prd">
                        <li><i class="fas fa-check-circle" style="color: green;"></i> Free Shipping Over $300</li>
                        <li><i class="fas fa-check-circle" style="color: green;"></i> Ships in 24 Hours</li>
                        <li><i class="fas fa-check-circle" style="color: green;"></i> 24 Months Warranty</li>
                    </ul>
                </div>
                <div class="col-lg-6 py-3">
                    <h6 class="text-uppercase"><i class="fas fa-exchange-alt"></i> RETURNS</h6>
                    <ul class="list-unstyled list-detail-prd">
                        <li><i class="fas fa-check-circle" style="color: green;"></i> 7 Days Replacement Only</li>
                        <li><i class="fas fa-check-circle" style="color: green;"></i> Certified By TinyHub</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Description-->
<div class="container product-description bg-white card mb-5">
    <div class="row py-3">
        <div class="col m-3 ">
            <ul class="nav nav-pills d-flex justify-content-center">
                <li class="nav-item"><a data-toggle="tab" href="#description" class="nav-link active" aria-selected="true" style="margin-right: 15px;">Description</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#reviews" class="nav-link" aria-selected="false" style="margin-left: 15px;">Reviews</a></li>
            </ul>
            <div class="tab-content">
                <div id="description" class="tab-pane active">
                    <p>{{$product->long_descriptions}}</p>
                </div>
                <div id="reviews" class="tab-pane">
                    <!-- 
                    <div class="row review">
                        <div class="col-3 text-center"><img src="" alt="Na Nguyen" class="review-image"><span></span></div>
                        <div class="col-9 review-text">
                            <h6>Na Nguyen</h6>
                            <hr width="100%">
                            <p></p>
                        </div>
                    </div>
                    <div class="row review">
                        <div class="col-3 text-center"><img src="img/quang.jpg" alt="Quang Dang" class="review-image"><span>Dec 2018</span></div>
                        <div class="col-9 review-text">
                            <h6>Quang Dang</h6>
                            <hr width="100%">
                            <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream.</p>
                        </div>
                    </div>

                    {{-- Check Auth--}}
                    @auth
                    <div class="row review">
                        <div class="col-3 text-center"><img src="img/quang.jpg" alt="Quang Dang" class="review-image"><span>Dec 2018</span></div>
                        <div class="col-9 review-text">
                            <form action="">
                                <div>
                                    <h6>{{Auth::user()->name}}</h6>
                                    <hr width="100%">
                                </div>
                                <div class="form-group">
                                    <textarea name="" id="" class="form-control" placeholder="Looks like you want to share something ?"></textarea>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <input type="submit" class="btn btn-success" value="Post">
                                </div>
                            </form>
                        </div>
                    </div>
                    @endauth
                    {{--End auth--}}

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Title: You May Also Like -->
<div class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12">
                <h1 style="text-align: center;">You May Also Like</h1>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Similar Product -->
<div class="container">
    <div class="row py-5">
        <div class="col-xl-3">
            <div class="product_grid card-body card">
                <div class="product_image">
                    <a href="" class="image ">
                        <img class="pic_1 rounded" src="{{url("img/headphone-slider1.png")}}" alt="">
                        <img class="pic_2 rounded" src="{{url("img/headphone-slider2.png")}}" alt="">
                    </a>
                </div>
                <div class="product_content">
                    <h3 class="title"><a href="#">Heaphone TinyHub</a></h3>
                    <div class="price">$18.50</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="product_grid card-body card">
                <div class="product_image">
                    <a href="" class="image ">
                        <img class="pic_1 rounded" src="{{url("img/headphone-slider1.png")}}" alt="">
                        <img class="pic_2 rounded" src="{{url("img/headphone-slider2.png")}}" alt="">
                    </a>
                </div>
                <div class="product_content">
                    <h3 class="title"><a href="#">Heaphone TinyHub</a></h3>
                    <div class="price">$18.50</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="product_grid card-body card">
                <div class="product_image">
                    <a href="" class="image ">
                        <img class="pic_1 rounded" src="{{url("img/headphone-slider1.png")}}" alt="">
                        <img class="pic_2 rounded" src="{{url("img/headphone-slider2.png")}}" alt="">
                    </a>
                </div>
                <div class="product_content">
                    <h3 class="title"><a href="#">Heaphone TinyHub</a></h3>
                    <div class="price">$18.50</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="product_grid card-body card">
                <div class="product_image">
                    <a href="" class="image ">
                        <img class="pic_1 rounded" src="{{url("img/headphone-slider1.png")}}" alt="">
                        <img class="pic_2 rounded" src="{{url("img/headphone-slider2.png")}}" alt="">
                    </a>
                </div>
                <div class="product_content">
                    <h3 class="title"><a href="#">Heaphone TinyHub</a></h3>
                    <div class="price">$18.50</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
function incre(){
    document.getElementById("1").stepUp(1);
    document.getElementById("2").stepUp(1);
}
function decre(){
    document.getElementById("1").stepDown(1);
    document.getElementById("2").stepDown(1);
}

</script>