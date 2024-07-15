@extends('frontend.master')
@section('title')
    Services
@endsection
@section('content')

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="{{asset($banner->image) }}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Books</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Books</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Shop Single Start -->
        <div id="rs-single-shop" class="rs-single-shop shop-rp orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 sm-mb-30">
                        <div class="single-product-image">
                            <div class="images-single">
                                <img src="{{asset($product->image1)}}" alt="Single Product">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="single-price-info pl-30">
                            <h4 class="product-title">{{$product->name??null}}</h4>
                            <span class="single-price">${{$product->price??null}}</span>
                            <p class="some-text">{!! $product->details1??null !!}</p>
                            <form action="{{route('add-to-cart',['id'=>$product->id])}}" method="POST">
                                @csrf
                                <input type="number" class="input-text" name="qty" step="1" min="1" value="1">
                                <button class="btn-shop orange-color ml-10" type="submit">Add To cart</button>
                            </form>
                            <p class="category"><span>Category:</span><a href="#"> {{$product->category->name??null}}</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Shop Single Start -->



    </div>
    <!-- Main content End -->
@endsection
