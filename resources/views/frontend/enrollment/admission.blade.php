@extends('frontend.master')
@section('title')
   Enrollment
@endsection
@section('content')
<!-- Main content Start -->
 <div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay certificate-form">
        <div class="breadcrumbs-img">

            <img src="https://image.freepik.com/free-vector/flat-cartoon-hand-holding-loudspeaker-banner-announcement-text-copy-space-template_101884-874.jpg" style="height: 300px;" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Admission Now</h1>
            <ul>
                <li>
                    <a class="active" href="{{route('front.page')}}">Home</a>
                </li>
                <li>Course Admission</li>
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
                      <h1>শিক্ষার্থীদের ভর্তির কোর্স সমূহ   </h1>
                  </div>
              </div>
          </div>
      </div>
      <div class="row pt-35">
        <table class="table table-responsive-sm table-bordered" style="width: 100%">
          <thead>
              <tr>
                  <th width="50%" class="text-center">কোর্সের নাম</th>
                  <th width="40%">কোর্স ফি </th>
                  <th width="10%" class="text-center">ভর্তি </th>
              </tr>
          </thead>
          <tbody>
              @foreach($services as $service )
                          <tr>
                <td class="text-center">{{ $service->service_title }} </td>
                <td style="font-family: 'Bangla', sans-serif; font-size: 1.2rem;">{{$service->price}} ৳</td>
                <td class="text-center"> <a href="{{ route('enrollment',$service->id) }}" target="”_blank”" class="px-3 py-1 btn btn-info rounded-0"> এডমিশন </a> </td>
              </tr>
              @endforeach
                          
                      </tbody>
        </table>
      </div>
  
  </div>
</div>

    

</div> 


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
            //  $('.hideinput').hide();
        }
    }

    function upimg() {
        $('#trade').click();
    }
</script>

<script>
    (function($) {
        $(document).ready(function() {
            $('#print-application').on('click', function() {
                $('.card.application-form').removeClass('d-print-none').addClass('d-print-block');
                $('.card.certificate-form').removeClass('d-print-block').addClass('d-print-none');
                print();
            });

        });
    })(jQuery);
</script>

<!-- Main content End -->
@endsection
