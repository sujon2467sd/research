<div class="rs-gallery pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title3 text-center mb-50">
            <div class="sub-title"> @if(session()->get('language') == 'bangla') আমাদের গ্যালারি @else Our Gallery @endif</div>
            <h2 class="title">{{$banner->title??null}}</h2>
        </div>
        <div class="row margin-0">
            @foreach($galleries as $gallery)
                <div class="col-lg-4 mb-0 padding-0 col-md-6">
                    <div class="gallery-img">
                        <a class="image-popup" href="{{asset($gallery->image)}}"><img src="{{asset($gallery->image)}}" alt=""></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
