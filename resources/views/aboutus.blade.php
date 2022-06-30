@extends('layouts.main')
@section('content')

<!-- Banner Section Begin -->

<section class="banner_sec_main about_inner con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_mission_sec">
                    <div class="mission_icon_sec">
                        <img src="{{asset('images/mission-icon-01.png')}}" class="img-responsive">

                        <div class="line_break_mssion">
                            <img src="{{asset('images/mission-break-line.png')}}" class="img-responsive" alt="">
                        </div>

                        <div class="mission_content_banner">
                            <h2>Our Mission</h2>
                            <p>Our whole platform is designed to encourage progression in all forms. We train our tutors to provide tailored tutoring plans so that every pupil that joins us can bolster their grades, confidence and enjoyment! We also pride ourselves on tip-top customer service so that every pupil gets the best tutor for them. A high-quality all-round service is what we strive to provide, and evidence shows that just one term of weekly sessions will on average bump up a pupil by a whole grade!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about_mission_sec">
                    <div class="mission_icon_sec">
                        <img src="{{asset('images/mission-icon-02.png')}}" class="img-responsive">

                        <div class="line_break_mssion">
                            <img src="{{asset('images/mission-break-line.png')}}" class="img-responsive" alt="">
                        </div>

                        <div class="mission_content_banner">
                            <h2>Why Progressio Tuition?</h2>
                            <p>We believe that personalisation is the key to perfection. Most services just match a pupil with a tutor and leave it at that, but we will always go the extra mile. If you can’t find a tutor then we will do the research for you, if you can’t work out what the best resources are then our tutors will find them for you, if you have any problems then we’ll stay in the office until you’re happy! The list really does go on...</p>

                            <p>We are also leading the market in terms of group lessons! Many tutoring sites try to limit sessions to one-to-one because they can take a larger commission, but not us. We offer two-to-one and three-to-one sessions at massively reduced rates; just give us a call and we can build a tailored action plan just for you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section End -->

<!-- Founder Message Section Begin -->

<section class="founder_message_sec con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="founder_message_img">
                    <img src="{{asset('images/founder-image.jpg')}}" class="img-responsive" alt="Founder">
                </div>
            </div>

            <div class="col-md-6">
                <div class="founder_message_content">
                    <h2>A Message <br> from the Founder</h2>

                    <p>For the past few years there has been a boom in online tuition, I have myself tutored tens of primary and secondary school students and taught hundreds of sessions. I have worked for some of the large tuition providers, but I always found that they felt dated and didn’t really work for the pupils in the way that they could. I designed Progressio Tuition by collaborating with pupils, students and teachers to pick out all of the good bits and reinvent the parts that still felt ‘old’. By building a new site completely from scratch I have been able to ensure that we can be market-leaders in every aspect from the quality of lessons to our customer service. I am absolutely determined to ensure that every part of your experience with Progressio Tuition is as excellent as it can possibly be and, if it ever gets anything less than 100% in your mind, I will always be in the office if you ask for me. That is my pledge to you as a pupil, parent, guardian or teacher, if you ever ask one of the Progressio Tuition team to put me on the phone, I will move Heaven and Earth to get back to you ASAP. What other business can promise you that?</p>

                    <p>My greatest hope is that you derive huge benefits from Progressio Tuition, whether you have tutoring every week, or you only attend our (completely free and open to all!) seminars, we just want to help you learn, improve and progress.</p>

                    <h4>Jacob Mills</h4>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founder Message Section End -->
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