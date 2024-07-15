@extends('frontend.master')
@section('title')
   Member details
@endsection
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="{{asset($banner->image??null)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Member details</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Member details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Shop Single Start -->
        <div class="container my-5">
            <div class="row mt-2">
                <div class="col-lg-12 ">
                    <div class="card mt-3">
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <h3 class="text-center">@if(session()->get('language')=='bangla') তথ্য  @else Member Details @endif </h3>
                            <form class="form-horizontal" action="{{route('user.member.details.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                                <div class="form-group">
                                    <label>Facebook link</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $user_details ? ($user_details->facebook ?? 'N/A') : '' }}" id="facebook" placeholder="Facebook Link">

                                </div>

                                <div class="form-group">
                                    <label>Twitter link</label>
                                    <input type="email" class="form-control" rows="5" name="twitter" value="{{$user_details ?  ($user_details->twitter ?? '') : ''}}" id="email" placeholder="twitter">
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" rows="5" value="{{$user_details ? ($user_details->instagram?? 'N/A') : '' }}"name="instagram" id="youtube" placeholder="instagram">
                                </div>

                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" rows="5" value="{{$user_details ? ($user_details->youtube ?? 'N/A') : '' }}" name="youtube" id="youtube" placeholder="gmail">
                                </div>

                                <div class="form-group">
                                    <label> Details</label>
                                    <textarea id="default" class="editor form-control" col="10" row="3" name="details" >{{$user_details ? ($user_details->details ?? 'N/A') : ''}}</textarea>
                                </div>

                                {{-- <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image"  class="form-control">
                                    <img src="{{$user->image??null}}" class="my-4" height="100" width="100" alt="">
                                </div> --}}
                                <div class="table-responsive">
                                    <button type="submit" class="btn btn-info">@if(session()->get('language')=='bangla') সাবমিট @else Submit @endif </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Main content End -->
@endsection
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#default'
    });
</script>
