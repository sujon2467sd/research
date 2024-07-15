@extends('frontend.master')

@section('content')

<!-- Main content Start -->
<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            @php
                $banner=\App\Models\BannerAndTitle::where('page','login')->latest()->first();
            @endphp
            <img src="{{asset($banner->image??null)}}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">@if(session()->get('language')== 'bangla') আমার অ্যাকাউন্ট @else My Account @endif </h1>
            <ul>
                <li>
                    <a class="active" href="index.html">Home</a>
                </li>
                <li>My Account</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- My Account Section Start -->
    <div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="noticed">
                <div class="main-part">
                    <div class="method-account">
                        <h2 class="login">@if(session()->get('language')== 'bangla') প্রবেশ করুন @else Login @endif </h2>
                        @if(session('error'))
                            <p class="text-danger">{{session('error')}}</p>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
{{--                            <input type="email" name="E-mail" placeholder="E-mail" required="">--}}
                            <input id="phontext" type="text" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <button type="submit" class="readon submit-btn">@if(session()->get('language')== 'bangla') প্রবেশ করুন @else Login @endif</button>
                            <div class="last-password">
                                <p>@if(session()->get('language')== 'bangla') নিবন্ধিত না? @else Not registered? @endif <a href="{{route('register')}}">@if(session()->get('language')== 'bangla') অ্যাকাউন্ট তৈরি করুন @else Create an account @endif </a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Section End -->

</div>
<!-- Main content End -->

{{--<!-- Breadcrumb Start -->--}}
{{--    <div class="breadcrumb-wrap bg-f br-1">--}}
{{--        <div class="container">--}}
{{--            <div class="breadcrumb-title">--}}
{{--                <h2>Register</h2>--}}
{{--                <ul class="breadcrumb-menu list-style">--}}
{{--                    <li><a href="index.html">Home </a></li>--}}
{{--                    <li>Login</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Breadcrumb End -->--}}

{{--    <!-- Account Section start -->--}}
{{--    <section class="Login-wrap pt-100 pb-75">--}}
{{--        <div class="container">--}}
{{--            <div class="row gx-5">--}}
{{--                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">--}}
{{--                    <div class="login-form-wrap">--}}
{{--                        <div class="login-header">--}}
{{--                            <h3>Login</h3>--}}
{{--                        </div>--}}
{{--                        <form class="login-form" method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input id="email" name="email" type="email" placeholder="Username Or Email Address" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input id="password" name="password" placeholder="Password" type="password" >--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">--}}
{{--                                    <div class="checkbox style3">--}}
{{--                                        <input type="checkbox" id="test_1">--}}
{{--                                        <label for="test_1">--}}
{{--                                            Remember Me</a>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end mb-20">--}}
{{--                                    <a href="recover-password.html" class="link style1">Forgot Password?</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <button class="btn style1 w-100 d-block">--}}
{{--                                            Login Now--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <p class="mb-0">Don't have an Account? <a class="link style1" href="register.html">Create One</a></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Account Section end -->--}}

</div>
<!-- Content wrapper end -->
@endsection
