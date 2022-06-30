<!-- Banner Section Begin -->

<section class="banner_sec_main con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="banner_img_sec">
                    <img src="{{asset('images/faq-banner.jpg')}}" class="img-responive" alt="Banner Image">
                </div>
            </div>

            <div class="col-md-3">
                <div class="banner_form_sec">
                    <h2>{{$faqname}}</h2>
                    <div class="banner_links">
                        <ul>
                            <li><a href="{{route('faq')}}" class="{{$menu=='faq'?'active':''}}">@if($menu=='faq')<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Quick FAQs</a></li>
                            <li><a href="{{route('faqparentguardian')}}" class="{{$menu=='faqparentguardian'?'active':''}}">@if($menu=='faqparentguardian')<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Parent, Guardian & Pupil FAQs</a></li>
                            <li><a href="{{route('faqtutor')}}" class="{{$menu=='faqtutor'?'active':''}}">@if($menu=='faqtutor')<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Tutor FAQs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section End -->