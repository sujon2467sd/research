@extends('frontend.master')
@section('title')
    details
@endsection
@section('content')


    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($blog->banner_image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">publication Details</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>{{ $blog->title }}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Section Start -->



        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">

            <div class="container">
                <div class="card">

                    @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                            <div class="card-body">
                                <h5>Available Author</h5>
                                    @foreach ($authors as $author)

                                    @php
                                    $check=\App\Models\OrderTable::where('publication_id',$blog->id)->where('author_id',  $author->id)->first();

                                @endphp

                                @if($check)
                                <span class="btn btn-danger mb-4">{{  $author->title }} Sold</span>
                                @else
                                    <span class="btn btn-success mb-4">{{  $author->title }}</span>
                                    @endif
                                    @endforeach

                                   @if (Auth::user())
                                   <button type="button" class="btn btn-success btn-lg float-right" data-toggle="modal" data-target="#exampleModalCenter1">
                                    Buy NOw
                                </button>
                                @else
                                
                                <button type="button" class="btn btn-success btn-lg float-right " data-toggle="modal" data-target="#exampleModalCenter2">
                                    Buy NOw
                                </button>

                                   @endif

                            </div>


                </div>
            </div>

            <div class="container">
                <div class="blog-deatails">

                    <div class="bs-img">
                        <a href="#"><img src="{{ asset($blog->main_image) }}" width="100%" height="600px" alt=""></a>
                    </div>
                    <div class="blog-full">
                        <div class="post-para">
                            {!! $blog->details1 !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-img">
                                        <img src="{{asset($blog->details_image2)}}" width="100%" class="mb-2" alt="Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-img">
                                        <img src="{{asset($blog->details_image3)}}" width="100%" class="mb-2" alt="Image">
                                    </div>
                                </div>
                            </div>
                            {!! $blog->details2 !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->




     <!--Registart Now Modal -->

     <form action="{{ route('order.author') }}" method="POST">
        @csrf

       <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content" style="background: linear-gradient(to left, #185a9d, #43cea2);">
               <div class="modal-header">
                 <h4 class="modal-title" id="exampleModalCenterTitle">Loging First</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>



               <div class="modal-body">
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


               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

               </div>
             </div>



           </div>
         </div>
       </div>

   </form>


    {{-- Buy Modal --}}

   <form action="{{ route('order.author') }}" method="POST" enctype="multipart/form-data">
      @csrf

   <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content" style="background: linear-gradient(to left, #185a9d, #43cea2);">
           <div class="modal-header">
             <h4 class="modal-title" id="exampleModalCenterTitle">Check out</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>



           <div class="modal-body">
               <div class="author">
                   <div class="row">

                       <input type="hidden"  name="publication_id" value="{{$blog->id }}">

                       <input type="hidden" id="selectedAuthorId" name="author_id" value="{{ old('author_id') }}">


                       <div class="col-12">
                           <h6>Select Author</h6>
                           @foreach ($authors as $author)

                            @php
                            $check=\App\Models\OrderTable::where('publication_id',$blog->id)->where('author_id',  $author->id)->first();

                            @endphp

                            @if($check)

                            @else
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm author-btn p-2 ml-4" data-id="{{ $author->id }}">{{ $author->title }}</a>
                            @endif



                        @endforeach
                           <div class="form-group mt-3">
                               <label>Name *</label>
                               <input type="text" class="form-control" rows="5" name="name" id="title" placeholder="name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                           </div>
                           <div class="form-group">
                               <label>Number *</label>
                               <input type="text" class="form-control" rows="5" name="number" id="title" placeholder="phone number">
                               @error('number')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>
                           <div class="form-group">
                               <label>Transaction Screenshot </label>
                               <input type="file" class="form-control" rows="5" name="img" id="title">
                               @error('img')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>


                           <div class="form-group">
                               <p>Select Payment Method</p>
                               <div class="custom-control custom-checkbox mb-3">
                                   <input type="checkbox"  name="payment" class="custom-control-input" value="bkash" id="customCheckBkash">
                                   <label class="custom-control-label" for="customCheckBkash">Bkash</label>
                               </div>
                               <div class="custom-control custom-checkbox mb-3">
                                   <input type="checkbox" name="payment"  value="nagad" class="custom-control-input" id="customCheckNagad">
                                   <label class="custom-control-label" for="customCheckNagad">Nagad</label>
                               </div>
                               <div class="custom-control custom-checkbox mb-3">
                                   <input type="checkbox"  name="payment" value="rocket" class="custom-control-input" id="customCheckRocket">
                                   <label class="custom-control-label" for="customCheckRocket">Rocket</label>
                               </div>
                               @error('payment')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror
                          </div>
                   </div>

               </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-warning">Click for Buy</button>
           </div>
         </div>



       </div>
     </div>
   </div>

</form>



       <style>
           .author-btn.selected {
               border: 2px solid #097d15;
           }
       </style>

   <script>
       $(document).ready(function() {
           // Initialize selected author ID from the hidden input field (if already selected)
           var selectedAuthorId = $('#selectedAuthorId').val();
           if (selectedAuthorId) {
               $('.author-btn[data-id="' + selectedAuthorId + '"]').addClass('selected');
           }

           $('.author-btn').on('click', function(e) {
               e.preventDefault();

               // Remove selected class from all buttons
               $('.author-btn').removeClass('selected');

               // Add selected class to the clicked button
               $(this).addClass('selected');

               // Get the selected author's ID
               var selectedId = $(this).data('id');
               console.log('Selected author ID:', selectedId);

               // Store the selected author's ID in the hidden input
               $('#selectedAuthorId').val(selectedId);
           });

           // Prevent deselection when clicking inside the input fields
           $('#name, #phone').on('click', function(e) {
               e.stopPropagation(); // Prevent click event from bubbling up to parent elements
           });
       });
   </script>





@endsection
