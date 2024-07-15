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
                <h1 class="page-title">Certificate Verify</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Certificate Verify</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('check.certificate')}}" enctype="multipart/form-data" method="GET">
                        @csrf
                        <div class="form-group">
                            <label>@if(session()->get('language')=='bangla') পরিষেবা নির্বাচন করুন @else Select Service @endif</label>
                            <select class="form-control" name="service_id">
                                <option value="" disabled selected>Select Service</option>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->service_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>@if(session()->get('language')=='bangla') স্টুডেন্ট রোল নির্বাচন করুন @else Select Student Roll @endif</label>
                            <input type="text" name="roll" class="form-control">
                        </div>

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Check</button>
                        </div>
                    </form>
                </div>

                @if($data)
{{--                    <embed src="{{asset($data)}}" type="application/pdf" width="100%" height="600px" />--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <iframe src="{{asset($data)}}" width="50%" height="600">--}}
{{--                            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset($data) }}">Download PDF</a>--}}
{{--                        </iframe>--}}
{{--                    </div>--}}
                <div class="mx-auto">
                    <a class="mt-4 p-3 d-inline-block" href="{{ asset($data) }}" style="border: 2px solid #138496">Download PDF</a>                  
                </div>
{{--                    <object data="{{ asset($data) }}" type="application/pdf" width="100%" height="100%">--}}
   
                @endif
            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
@endsection
