


<footer id="rs-footer" class="rs-footer home9-style main-home">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <div class="footer-logo mb-30">
                        @php $logo = \App\Models\Logo::latest()->first() @endphp
                        <a href="index.html"><img src="{{asset($logo->logo_image1??null)}}" alt=""></a>
                    </div>
                    <div class="textwidget pr-60 md-pr-15"><p class="white-color">{{$footer->details??null}}</p>
                    </div>
                    <ul class="footer_social">
                        <li>
                            <a href="{{$links->facebook}}" target="_blank"><span> <i class="fa-brands fa-facebook"></i></span></a>
                        </li>
                        <li>
                            <a href="{{$links->youtube}} " target="_blank"><span><i class="fa-brands fa-youtube"></i></span></a>
                        </li>

                        <li>
                            <a href="{{$links->instagram}}" target="_blank"><span><i class="fa-brands fa-instagram"></i></span></a>
                        </li>
                        <li>
                            <a href="{{$links->linkedIn}}" target="_blank"><span><i class="fa-brands fa-linkedin"></i></span></a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h3 class="widget-title">@if(session()->get('language') == 'bangla') ঠিকানা @else Address @endif </h3>
                    <ul class="address-widget">
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc">{{$links->address}}</div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:{{$links->number}}">{{$links->number}}</a>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:{{$links->email}}">{{$links->email}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
                {{-- <div class="col-lg-3 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                    <h3 class="widget-title">@if(session()->get('language') == 'bangla') পাঠ্যধারাগুলি @else Courses @endif</h3>
                    <ul class="site-map">
                        @foreach($services as $service)
                        <li><a href="{{route('services.details',['id'=>$service->id])}}">{{$service->service_title}}</a></li>
                        @endforeach
                    </ul>
                </div> --}}
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget">
                    <h3 class="widget-title">@if(session()->get('language') == 'bangla') সাম্প্রতিক পোস্ট @else Recent Posts @endif</h3>
                    @foreach($footer_blogs as $blog)
                    <div class="recent-post mb-20">
                        <div class="post-img">
                            <img src="{{asset($blog->main_image??null)}}" alt="">
                        </div>
                        <div class="post-item">
                            <div class="post-desc">
                                <a href="{{route('blogs.details',['id'=>$blog->id])}}">{{$blog->title??null}}</a>
                            </div>
                            @php $timestamp = strtotime($blog->created_at); $month = date('M', $timestamp);$year = date('Y', $timestamp);@endphp

                            <span class="post-date">
                                        <i class="fa fa-calendar"></i>
                                        {{ $month }} {{ $blog->created_at->format('d') }}, {{$year}}
                                    </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-6 md-mb-20">
                    <div class="copyright">
                        <p>&copy; {{$footer->credit}}</p>
                    </div>
                </div>
                <div class="col-lg-6 text-right md-text-left">
                    <ul class="copy-right-menu">
                        <li><a href="{{route('blogs.page')}}">@if(session()->get('language') == 'bangla') ব্লগ @else Blog @endif</a></li>
                        <li><a href="{{route('contacts')}}">@if(session()->get('language') == 'bangla') যোগাযোগ @else Contact @endif</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
