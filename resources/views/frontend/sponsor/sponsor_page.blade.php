@extends('frontend.master')
@section('title')
    Blogs
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
                <h1 class="page-title">Sponsor</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Sponsor</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row grid">
                    @foreach($sponsors as $sponsor)
                        <div class="col-lg-3 col-md-4 grid-item filter1" style="">
                            <div class="mb-30" style="border: 1px solid #dfe9eb;transition: all 0.3s ease;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                <div class="">
                                    <img src="{{asset($sponsor->image)}}" width="100%" style="height: 150px;padding: 10px" alt="">
                                </div>

                                <div class="content-part ">

                                    <h3 class="title text-center"><a style="color: #FF5421" href="">@if(session()->get('language')=='bangla') {{$sponsor->title_bangla??null}} @else {{$sponsor->title??null}} @endif</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$sponsors->links()}}
            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
@endsection
