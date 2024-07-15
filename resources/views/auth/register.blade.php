@extends('frontend.master')

@section('content')


<!-- Main content Start -->
<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            @php
                $banner=\App\Models\BannerAndTitle::where('page','register')->latest()->first();
            @endphp
            <img src="{{asset($banner->image??null)}}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">@if(session()->get('language')== 'bangla') নিবন্ধন পেজ @else Register @endif </h1>
            <ul>
                <li>
                    <a class="active" href="index.html">Home</a>
                </li>
                <li>Register</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Register Section -->
    <section class="register-section pt-100 pb-100">
        <div class="container">
            <div class="register-box">

                <div class="sec-title text-center mb-30">
                    <h2 class="title mb-10">@if(session()->get('language')== 'bangla') নতুন অ্যাকাউন্ট তৈরি করুন @else Create New Account @endif </h2>
                </div>

                <!-- Login Form -->
                <div class="styled-form">
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="row">
                            <!-- Form Group -->
                            <div class="form-group col-lg-12 mb-25">
                                <input id="name" type="text" name="name" type="text" placeholder="Username" required>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input id="phone" type="text" name="phone" type="text" placeholder="Phone Number" required>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input id="pwd" name="password" placeholder="Password" type="password" >
                            </div>
                            <!-- Form Group -->
                            <div class="form-group col-lg-12">
                                <input id="pwd_2" name="password_confirmation" placeholder="Confirm Password"  type="password" >
                            </div>


                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                <button type="submit" class="readon register-btn"><span class="txt">@if(session()->get('language')== 'bangla') নিবন্ধন করুন @else Sign Up @endif</span></button>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <div class="users">@if(session()->get('language')== 'bangla') ইতিমধ্যে একটি সদস্যপদ আছে? @else Already have an account? @endif  <a href="{{route('login')}}">@if(session()->get('language')== 'bangla') নিবন্ধন করুন @else Sign In @endif </a></div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- End Login Section -->

</div>
<!-- Main content End -->
@endsection
