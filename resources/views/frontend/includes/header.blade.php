<div class="full-width-header home8-style4 main-home">
    <!--Header Start-->
    <header id="rs-header" class="rs-header">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container-fluid">
                <div class="row y-middle">
                    <div class="col-lg-2">
                        <div class="logo-cat-wrap">
                            <div class="logo-part">
                                <a href="{{route('front.page')}}">
                                    @php $logo = \App\Models\Logo::latest()->first() @endphp
                                    @php $menus = \App\Models\Menu::get() @endphp
                                    @php $results = \App\Models\Result::get() @endphp


                                    <img class="normal-logo" src="{{asset($logo->logo_image1??null)}}" alt="">
                                    <img class="sticky-logo" src="{{asset($logo->logo_image??null)}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-left">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <div class="mobile-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <li class="menu-item {{Request::routeIs('front.page') ? 'current-menu-item' : ''}}"> <a href="{{route('front.page')}}">
                                            @if(session()->get('language') == 'bangla') হোম @else Home @endif </a>

                                        </li>
{{--                                        <li class="menu-item {{Request::routeIs('about.page') ? 'current-menu-item' : ''}}">--}}
{{--                                            <a href="{{route('about.page')}}">About</a>--}}
{{--                                        </li>--}}
                                        <!--<li class="menu-item-has-children">-->
                                        <!--    <a href="#">-->
                                        <!--        @if(session()->get('language') == 'bangla') সম্পর্কিত @else About @endif -->
                                        <!--    </a>-->
                                        <!--    @php $abouts =  \App\Models\About::get() @endphp-->
                                        <!--    <ul class="sub-menu">-->
                                        <!--        @foreach($abouts as $about)-->
                                        <!--        <li class="menu-item">-->
                                        <!--            <a href="{{route('about.page',['id'=>$about->id])}}">-->
                                        <!--                @if(session()->get('language') == 'bangla') {{$about->title_bangla}} @else {{$about->title}} @endif </a>-->
                                        <!--        </li>-->
                                        <!--        @endforeach-->
                                        <!--    </ul>-->
                                        <!--</li>-->
                                          @foreach($menus as $menu)
                                            @php $sub_menus = \App\Models\SubMenu::Where('menu_id',$menu->id)->get() @endphp

                                            <li class="menu-item-has-children">

                                            <a href="#">
                                                @if(session()->get('language') == 'bangla') {{$menu->title_bangla}} @else {{$menu->title}} @endif </a>



                                            <ul class="sub-menu">

                                                <li class="menu-item">
                                                    <a href="{{ route('about.us') }}">
                                                         @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে  @else About Us @endif</a>
                                                </li>

                                                @foreach($sub_menus as $sub_menu)
                                                <li class="menu-item">
                                                    <a href="{{route('submenu.details',['id'=>$sub_menu->id])}}">
                                                        @if(session()->get('language') == 'bangla') {{$sub_menu->title_bangla}} @else {{$sub_menu->title}} @endif </a>
                                                </li>
                                                @endforeach



                                                 {{-- <li class="menu-item">
                                                    <a href="/managing/committe">
                                                         @if(session()->get('language') == 'bangla') নির্বাহী  কমিটি @else Managing Committee @endif</a>
                                                </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('sponsor.page')}}">
                                                            @if(session()->get('language') == 'bangla') স্পন্সর @else Sponsor @endif</a>
                                                    </li> --}}

                                            </ul>
                                         </li>

                                        @endforeach


{{--                                        <li class="menu-item {{Request::routeIs('services') ? 'current-menu-item' : ''}}">--}}
{{--                                            <a href="{{route('services')}}">Courses</a>--}}
{{--                                        </li>--}}
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('team.page') }}">
                                                @if(session()->get('language') == 'bangla') দলগত  @else Team Mate @endif  </a>
                                            {{-- <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="{{route('services')}}">
                                                        @if(session()->get('language') == 'bangla') প্রশিক্ষণ কোর্স @else Training Course @endif
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{route('consultancy.page')}}">Student Consultancy</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{route('research.page')}}">Research or Publication</a>
                                                </li>
                                            </ul> --}}
                                        </li>

                                        <li class="menu-item {{Request::routeIs('blogs-publications') ? 'current-menu-item' : ''}}">
                                            <a href="{{route('blogs.page.publications')}}">
                                                @if(session()->get('language') == 'bangla') পোষ্ট @else Publications @endif
                                            </a>
                                        </li>

                                        {{-- @foreach($results as $result)
                                            @php $subjects = \App\Models\Subject::Where('result_id',$result->id)->get() @endphp

                                            <li class="menu-item-has-children">
                                            <a href="#">
                                                @if(session()->get('language') == 'bangla') {{$result->title_bangla }} @else {{$result->title}} @endif </a>
                                            <ul class="sub-menu">
                                                @foreach($subjects as $subject)
                                                <li class="menu-item">
                                                    <a href="{{ route('show.result',['id'=>$subject->id]) }}">
                                                        @if(session()->get('language') == 'bangla') {{ $subject->subject_name_bangla }} @else {{$subject->subject_name_english}} @endif</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach --}}

                                        {{-- <li class="menu-item-has-children">
                                            <a href="#">Results</a>
                                            <ul class="sub-menu">

                                                <li class="menu-item">
                                                    <a href="{{route('create.result')}}">Create Result</a>
                                                    <a href="{{route('blogs.page')}}">Upload Result</a>
                                                    <a href="">Edit Result</a>
                                                </li>

                                            </ul>
                                        </li>     --}}
                                        <!--<li class="menu-item {{Request::routeIs('blogs.page') ? 'current-menu-item' : ''}}">-->
                                        <!--    <a href="{{route('blogs.page')}}">-->
                                        <!--        @if(session()->get('language') == 'bangla') ব্লগ @else Blog @endif-->
                                        <!--    </a>-->

                                        <!--</li>-->
                                        <!--<li class="menu-item {{Request::routeIs('team.page') ? 'current-menu-item' : ''}}">-->
                                        <!--    <a href="{{route('team.page')}}">-->
                                        <!--        @if(session()->get('language') == 'bangla') প্রশিক্ষক @else Instructors @endif -->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        {{-- <li class="menu-item {{Request::routeIs('allnotice.page') ? 'current-menu-item' : ''}}">
                                            <a href="{{route('allnotice.page')}}">
                                                @if(session()->get('language') == 'bangla') নোটিশ @else Notice @endif
                                            </a>

                                        </li> --}}
                                        {{-- <li class="menu-item {{Request::routeIs('team.page') ? 'current-menu-item' : ''}}">
                                            <a href="{{route('team.page')}}">
                                                @if(session()->get('language') == 'bangla') প্রশিক্ষক @else Instructors @endif
                                            </a>
                                        </li> --}}



                                        <li class="menu-item {{Request::routeIs('gallery.page') ? 'current-menu-item' : ''}}">
                                            <a href="{{route('gallery.page')}}">
                                                @if(session()->get('language') == 'bangla') গ্যালারি @else Gallery @endif
                                            </a>
                                        </li>
                                        <li class="menu-item {{Request::routeIs('contacts') ? 'current-menu-item' : ''}}">
                                            <a href="{{route('contacts')}}">
                                                @if(session()->get('language') == 'bangla') যোগাযোগ @else Contact @endif
                                            </a>
                                        </li>




                                        <!--<li class="menu-item {{Request::routeIs('contacts') ? 'current-menu-item' : ''}}">-->
                                        <!--    <a href="{{route('product.page')}}">-->
                                        <!--        @if(session()->get('language') == 'bangla') বইয়ের দোকান @else Book Store @endif-->
                                        <!--    </a>-->
                                        <!--</li>-->

                                        <!--<li class="menu-item-has-children">-->
                                        <!--    <a href="#"> @if(session()->get('language') == 'bangla') বাংলা @else Language @endif </a>-->

                                        <!--    <ul class="sub-menu">-->
                                        <!--        @if(session()->get('language') == 'bangla')-->
                                        <!--        <li class="menu-item">-->
                                        <!--            <a href="{{ route('english.language')}}">English</a>-->
                                        <!--        </li>-->
                                        <!--        @else-->
                                        <!--        <li class="menu-item">-->
                                        <!--            <a href="{{ route('bangla.language')}}">বাংলা</a>-->
                                        <!--        </li>-->
                                        <!--       @endif-->
                                        <!--    </ul>-->
                                        <!--</li>-->



                                                @if(Auth::user()!=null)
                                                    @if(Auth::user()->is_admin == 0)
                                            <li class="menu-item-has-children d-inline d-lg-none">
                                                <a href="#">
                                                    @if(session()->get('language') == 'bangla') প্রোফাইল @else Profile @endif </a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item">
                                                        <a href="{{route('user.profile.settings')}}" class="crt-btn btn2 w-100">
                                                            @if(session()->get('language') == 'bangla') প্রোফাইল সেটিংস @else Profile Settings @endif </a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('enrollment.page')}}" class="crt-btn btn2 w-100">
                                                            @if(session()->get('language') == 'bangla') তালিকাভুক্তি @else Enrollments @endif </a>
                                                    </li>
                                                    <div class="cart-btn text-center">
                                                        <a class="crt-btn btn2 w-100" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" href="">
                                                            @if(session()->get('language') == 'bangla') লগআউট করুন @else Logout Out @endif </a>
                                                        <form action="{{route('logout')}}" id="logoutForm" method="POST">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </ul>
                                            </li>
                                            @endif
                                                @else
                                                        <a class="readon orange-btn main-home btn-sm d-block text-center d-lg-none" href="{{route('login')}}">@if(session()->get('language') == 'bangla') প্রবেশ করুন @else Login @endif</a>

                                                @endif




                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->

                        </div>
                    </div>
                    <div class="col-lg-2 text-right">

                                            {{-- <a class="btn btn-success" href="{{route('admission.page')}}">
                                                @if(session()->get('language') == 'bangla') ভর্তি  @else Admission @endif
                                            </a> --}}

                        <div class="expand-btn-inner">
                            <ul>
                                @if(Auth::user()!=null)
                                    @if(Auth::user()->is_admin == 0)
                                <li class="user-icon cart-inner no-border mini-cart-active">
                                    <a href="#"><i class="fa fa-user"></i></a>
                                    <div class="woocommerce-mini-cart text-left">
                                        <div class="cart-bottom-part">

                                            <div class="total-price text-center">
                                                <a href="{{route('user.profile.settings')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') প্রোফাইল @else Profile @endif </a>
                                            </div>

                                            <div class="total-price text-center">
                                                <a href="{{route('user.member.details')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') মেম্বার @else Member Details @endif </a>
                                            </div>

                                            {{-- <div class="total-price text-center">
                                                <a href="{{route('blogs.page')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') পোস্ট প্রকাশ করুন @else publish Post @endif </a>
                                            </div> --}}

                                            <div class="total-price text-center">
                                                <a href="{{route('enrollment.page')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') তালিকাভুক্তি @else Enrollments @endif </a>
                                            </div>

                                            <div class="cart-btn text-center">
                                                <a class="crt-btn btn2 w-100" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" href="">
                                                    @if(session()->get('language') == 'bangla') লগআউট করুন @else Logout Out @endif </a>
                                                <form action="{{route('logout')}}" id="logoutForm" method="POST">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    @endif
                                @else
                                    <a class="readon orange-btn main-home btn-sm" href="{{route('login')}}">
                                        @if(session()->get('language') == 'bangla') প্রবেশ করুন @else Login @endif </a>
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

    </header>
    <!--Header End-->
</div>
