@extends('frontend.master')
@section('title')
    Doctors
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
                <h1 class="page-title">Team One</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Team</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Team Section Start -->
        <div id="rs-team" class="rs-team  orange-color pt-94 pb-100 md-pt-64 md-pb-70 ">
            <div class="container">
                <h2 class="text-center mb-5">{{$banner->title??null}}</h2>
                <div class="row">

                    @foreach($teams as $team)
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                            <img  class="carcel" src="{{asset($team->image)}}" style="height: 250px;" alt="">
                            <div class="content-part pb-4">
                                <a href="{{ route('team.single.publication',$team->id) }}">
                                    <h4 class="text-center my-4 " style="background: #fe8c00;
                                background: -webkit-linear-gradient(to left, #f83600, #fe8c00);
                                background: linear-gradient(to left, #f83600, #fe8c00);
                                padding:10px;">{{$team->name}}</h4>
                                </a>
                                    {{-- <span class="designation">{{$team->designation}}</span> --}}

                               <a href=""><p class="p-2 text-dark" >  {{ $team->memberDetails ? Str::limit($team->memberDetails->details, 150) : 'N/A' }}</p></a>
                                    {{-- {!!  Str::limit($blog->short_details, 120) !!} --}}

                                 <hr>
                                     <ul class="social-links float-right" style="display: flex; ">

                                        <li style="padding: 0px 10px; font-size:25px;"><a href="{{ $team->memberDetails ? $team->memberDetails->facebook ?? 'N/A' : '' }}" class="text-primary" ><i class="fa-brands fa-facebook"></i></a></li>



                                        <li style="padding: 0px 10px; font-size:25px;" class="text-danger"><a href="{{ $team->memberDetails ? $team->memberDetails->youtube ?? 'N/A' : '' }}" class="text-danger"><i class="fa-brands fa-youtube"></i></a></li>



                                        <li style="padding: 0px 10px; font-size:25px;" class="text-info"><a href="{{ $team->memberDetails ? $team->memberDetails->twitter ?? 'N/A' : '' }}" class="text-info"><i class="fa-brands fa-twitter"></i></a></li>



                                        <li style="padding: 0px 10px; font-size:25px;"><a href="{{ $team->memberDetails ? $team->memberDetails->instagram ?? 'N/A' : '' }}" class="text-pink"><i class="fa-brands fa-instagram"></i></a></li>

                                 </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                {!! $teams->links() !!}
            </div>
        </div>
        <!-- Team Section End -->


    </div>
    <!-- Main content End -->
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}
@endsection
