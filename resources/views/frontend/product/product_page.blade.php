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

        <!--Shop part start-->
        <div class="rs-shop-part orange-color pt-130 pb-130 md-pt-80 md-pb-80">
            <div class="container">
{{--                <div class="row rs-vertical-middle shorting mb-25">--}}
{{--                    <div class="col-sm-6 col-12">--}}
{{--                        <p class="woocommerce-result-count">Showing 1-9 of 12 results</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-12">--}}
{{--                        <select class="from-control">--}}
{{--                            <option>Default sorting</option>--}}
{{--                            <option>Sort by popularity</option>--}}
{{--                            <option>Sort by average rating</option>--}}
{{--                            <option>Sort by lates</option>--}}
{{--                            <option>Sort by price: low to high</option>--}}
{{--                            <option>Sort by price: high to low</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-12 mb-53">
                        <div class="product-list">
                            <div class="image-product">
                                <img src="{{asset($product->image1)}}" alt="img">
{{--                                <div class="overley">--}}
{{--                                    <a href="#"><i class="flaticon-basket"></i></a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="content-desc text-center">
                                <h2 class="loop-product-title pt-15"><a href="{{route('product.details',['id'=>$product->id])}}">{{$product->name??null}}</a></h2>
                                <span class="price">${{$product->price??null}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagenav-link orange-color text-center">
                    <ul>
                        <li>1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="flaticon-next"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Shop part end-->


    </div>
    <!-- Main content End -->
@endsection
