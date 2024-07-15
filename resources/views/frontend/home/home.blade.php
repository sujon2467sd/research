@extends('frontend.master')
@section('title')
    Home
@endsection
@section('content')

    <!-- Slider Section Start -->
    @include('frontend.slider.slider')
    <!-- Slider Section End -->

{{--    about page start--}}
    @include('frontend.about.about')

    {{--    about page end--}}

    <!-- Categories Section Start -->
    @include('frontend.services.services')
    <!-- Categories Section End -->




    <!-- Testimonial Section Start -->
    {{-- @include('frontend.testimonial.testimonial') --}}

    <!-- Testimonial Section End -->

    <!-- Blog Section Start -->
    @include('frontend.blogs.blogs')
    <!-- Blog Section End -->

    <!--Counter One Start-->
    @include('frontend.counter.counter')
    <!--Counter One End-->

{{--    gallery start--}}
    <!-- Events Section Start -->
    {{-- @include('frontend.gallery.gallery') --}}
    <!-- Events Section End -->
    {{--    gallery end--}}


@endsection
