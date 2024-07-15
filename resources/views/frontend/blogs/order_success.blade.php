
@extends('frontend.master')
@section('title')
   Publish Blogs
@endsection
@section('content')

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($banner->image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Order </h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Home</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

            <div class="container  p-4">
                <div class="card text-center p-4">

                    <div class="card-body ">
                      <h5 class="card-title">Congratulation ! Your order done successfully</h5>
                      <p class="card-text">Your Order Id =<b> {{ $congress->id }}.</b></p>
                      <a href="{{route('front.page')}}" class="btn btn-primary">Home</a>
                    </div>
                    <div class="card-footer text-muted">
                      {{-- 2 days ago --}}
                      Thanks for order our website
                    </div>
                  </div>
            </div>

    </div>


@endsection



@if(session('message'))
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
@endif
