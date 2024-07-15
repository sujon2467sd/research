<link rel="apple-touch-icon" href="apple-touch-icon.html">
@php $logo = \App\Models\Logo::latest()->first() @endphp

<link rel="shortcut icon" type="image/x-icon" href="{{asset($logo->favicon??null)}}">
<!-- Bootstrap v4.4.1 css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/bootstrap.min.css">
<!-- font-awesome css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/font-awesome.min.css">
<!-- animate css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/animate.css">
<!-- owl.carousel css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/owl.carousel.css">
<!-- slick css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/slick.css">
<!-- off canvas css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/off-canvas.css">
<!-- linea-font css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/fonts/linea-fonts.css">
<!-- flaticon css  -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/fonts/flaticon.css">
<!-- magnific popup css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/magnific-popup.css">
<!-- Main Menu css -->
<link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/rsmenu-main.css">
<!-- spacing css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/rs-spacing.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/style.css"> <!-- This stylesheet dynamically changed from style.less -->
<!-- responsive css -->
<link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/responsive.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<style>
    .rs-cta.main-home .partition-bg-wrap:before {
        background: url({{asset('/')}}frontend/assets/images/cta/main-home.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        right: 0;
    }
    .rs-cta.main-home .partition-bg-wrap:after {
        background: url({{asset('/')}}frontend/assets/images/cta/home1.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .rs-faq-part.style1 .img-part {
        background: url({{asset('/')}}frontend/assets/images/faq/1.jpg);
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 100%;
        min-height: 615px;
    }
    .rs-testimonial.main-home {
        background: url({{asset($testimonial_title->image)}});
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .about-img-wrap {
        position: relative;
        padding-bottom: 150px;
    }

    .about-img-wrap .about-img-one {
        max-width: 400px;
        border-radius: 10px;
        margin-right: auto;
    }

    .about-img-wrap .about-img-two {
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 1;
        border-radius: 10px;
        max-width: 400px;
    }
    @media only screen and (max-width: 600px) {
        .about-img-wrap .about-img-one {
            max-width: 100%;
            border-radius: 10px;
            margin-right: auto;
        }
    }
</style>




{{-- toastr start for 4 link need ...its usable for botstrap 4 --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    $(document).ready(function() {
        @if(session('delete_success'))
            toastr.error('{{ session('delete_success') }}');
        @endif
    });
</script>

<script>
    $(document).ready(function() {
        @if(session('message'))
            toastr.success('{{ session('message') }}');
        @endif
    });
</script>

{{-- toaster end --}}
