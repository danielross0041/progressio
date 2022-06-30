@extends('layouts.main')
@section('content')

<!-- Banner Section Begin -->

<section class="banner_sec_main con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="banner_img_sec">
                    <img src="{{asset('images/Pricing-banner-img.jpg')}}" class="img-responive" alt="Banner Image">
                </div>
            </div>

            <div class="col-md-3">
                <div class="banner_form_sec">
                    <h2>Pricing</h2>
                    <p>Our tutors all set their own prices based on their professional backgrounds. Whatever tutor you choose we know that they are going to be fantastic because they have already completed our extensive training programme and passed our rigorous application and interview process. Below we have included a guide to pricing so that you can see roughly why tutors are charging their chosen fee.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section End -->


<!-- Pricing Section Begin -->

<section class="pricing_sec_main con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="pricing_tab_box">
                    <h3><span>£</span>18 - <span>£</span>20</h3>
                    <p>These tutors are new to tutoring so don’t have loads of experience. The benefits of selecting a tutor in this price range is that they often have plenty of availability and are really eager to prove themselves!</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="pricing_tab_box">
                    <h3><span>£</span>22 - <span>£</span>26</h3>
                    <p>These tutors probably have some great experience of tutoring and have a nice portfolio of top-quality reviews to prove their worth! The benefit of selecting a tutor in this price range is that they have developed their tutoring style and have proved that they make a really positive difference to a pupil’s performance.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="pricing_tab_box">
                    <h3><span>£</span>28 - <span>£</span>34</h3>
                    <p>These tutors are really experience when it comes to developing tailored tuition plans and identifying target areas for improvement. Usually, these tutors have extensive evidence of the positive impact that they can make and have a host of great reviews to back that up.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="pricing_tab_box">
                    <h3><span>£</span>34 - <span>£</span>38</h3>
                    <p>Tutors in this price range are our most experienced tutors and they will often have a degree under their belt as well. Tutors in this price range have evidenced exemplary performance over a long period and a vast array of different pupils. Additionally, they’ll already have loads of resources and honed tuition techniques.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section End -->

<section class="univer_sec_main group_lesson_sec pt-5 pb-5">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="uni_left_img">
                    <img src="{{asset('images/session-lesson-img.jpg')}}" class="img-responive" alt="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="uni_content_tab">
                    <div class="interveiw_process">
                        <h2>Looking for Group Lessons?</h2>
                        <p>Our two-to-one and three-to-one sessions are all tailored to fit your specific needs. If you would like us to cost a plan for you then please give us a call at XXXXXXXXXXX and we’ll take it from there!</p>
                    </div>

                    <div class="join_seminars_content">
                        <h2>How Can I Join the Seminars?</h2>
                        <p>You may have noticed that we run seminars in the afternoon and evening. These are completely free of charge! Even if you never spend a penny on tuition, you are always welcome to join in with our open access seminars.</p>
                    </div>

                    <div class="web_btn text-right">
                        <a href="#">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('css')
<style type="text/css">
    /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
    (() => {
        /*in page css here*/
    })()
</script>
@endsection