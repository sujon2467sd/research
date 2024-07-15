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
                <h1 class="page-title">Single Publications</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Team</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->


        <div class="container my-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="img" >
                            <img src="{{asset($teams->image)}}" alt="" style="height: 150px;">
                        </div>
                        <h3 class="pl-4 mt-3">
                            {{ $teams->name }}
                        </h3>

                        <p>{{ $teams->memberDetails->details }}</p>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                   <div class="card p-4">
                    <h3>Publications</h3><br><br>
                    @foreach($teams->blogs as $team)
                        <div class="row">
                            <div class="col-3">
                            <img src="{{asset($team->main_image)}}" alt="" width="300px" style="height:130px">
                            <p> published: {{ $team->created_at->format('M d, Y, g:i a') }}</p>
                            </div>

                            <div class="col-8">
                                <h5>{{ $team->title }}</h5>
                                <p>{!! $team->short_details !!}</p>

                            </div>

                        </div><hr>
                    @endforeach
                   </div>
                </div>
            </div> --}}
        </div>


        {{-- {!! $teams->links() !!} --}}

    </div>
    <!-- Main content End -->
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}
@endsection
