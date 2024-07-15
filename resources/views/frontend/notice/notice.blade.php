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
                <img src="https://image.freepik.com/free-vector/flat-cartoon-hand-holding-loudspeaker-banner-announcement-text-copy-space-template_101884-874.jpg" style="height: 300px;" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">All Notice</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

<div class="about-area pt-50 pb-70">
  <div class="container">
      <div class="row">
          <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
              <div class="section-title text-center">
                  <div class="section-title-heading mb-20">
                      <h1>শিক্ষার্থীদের জন্য নোর্টিশ সমূহ</h1>
                  </div>
              </div>
          </div>
      </div>
      <div class="row pt-35">
        <table class="table table-responsive-sm table-bordered" style="width: 100%">
          <thead>
              <tr>
                  <th width="15%" class="text-center">প্রকাশের তারিখ</th>
                  <th width="75%">শিরোনাম</th>
                  <th width="10%" class="text-center">বিস্তারিত</th>
              </tr>
          </thead>
          <tbody>
              @foreach($notices as $notice )
                          <tr>
                <td class="text-center">{{ Carbon\Carbon::parse($notice->created_at)->format('d') }}<br>{{ Carbon\Carbon::parse($notice->created_at)->format('M') }} </td>
                <td style="font-family: 'Bangla', sans-serif; font-size: 1.2rem;">{!! Str::words($notice->short_des,10) !!}....</td>
                <td class="text-center"> <a href="{{ route('notice.details',$notice->id) }}" target="”_blank”" class="px-3 py-1 btn-outline-secondary rounded-0"> পড়ুন </a> </td>
              </tr>
              @endforeach
                          
                      </tbody>
        </table>
      </div>
  
  </div>
</div>


    </div>
    <!-- Main content End -->
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}
@endsection
