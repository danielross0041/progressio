@extends('layouts.main')
@section('content')
@include('extends.faqhead',['menu'=>'faqtutor','faqname'=>'FAQ'])

<!-- Faq Section Begin -->

<section class="faq_sec_main con_sec_chg">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="heading_faq">
                    <h2>How do I become a tutor?</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="faq_content_tab">
                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> Am I eligible to become a tutor?</h2>
                        <p><span>A:</span> We are always looking for new people to join Progressio Tuition as tutors! If you have an A/A* at A-Level (or equivalent) and study at (or recently graduated from) a top UK University, then please don’t hesitate to start our quick and easy application process here {relevant link}</p>
                    </div>

                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> Do I need to have experience of tutoring to become a tutor?</h2>
                        <p><span>A:</span> Not at all! Everyone has to start somewhere, and Progressio Tuition is the perfect place to start your tutoring journey.</p>
                    </div>

                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> How do I become a tutor?</h2>
                        <p><span>A:</span> It’s really simple. Fill in the application question <a href="{{url('become-a-tutor')}}">here</a> and follow the instructions as you go. Becoming a tutor is also really easy, you’ll watch some short videos, complete a friendly interview (all online) and then complete the NSPCC training course. Simple!</p>
                    </div>

                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> What will I need for my application to become a tutor?</h2>
                        <p><span>A:</span> We will need a few things to make sure that you can join us as a tutor. The important ones include your A-Level (or equivalent) grade certificates, proof of study (or recent graduation), a form of ID, and (if you do not already have a DBS check) a few details so that we can sort out your Enhanced DBS certificate for you.</p>
                    </div>


                </div>
            </div>

            <div class="col-md-6">
                <div class="faq_content_tab">
                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> What happens at interview and how can I prepare?</h2>
                        <p><span>A:</span> Once you have applied you can set up an interview date and time. These are really friendly, we are not looking to test you, we just want to see that you are confident online and have a clear direction in your tutoring approach. As such, we will ask you a few questions about yourself and ask you to demonstrate a pre-prepared lesson plan (only 5 or 10 minutes!). </p>

                    </div>

                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> What subjects can I tutor?</h2>
                        <p><span>A:</span> Tutors can choose what subjects they tutor. However, in order to tutor a GCSE subject, you must have an A/A* in that subject and in order to tutor an A-Level you must be studying (or have studied) a relevant subject at university. Where there is strong evidence of academic ability in a subject outside of those requirements, you can feel free to let us know, and we can decide if you should be able to tutor in that one too!</p>
                    </div>

                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> What hardware do I need?</h2>
                        <p><span>A:</span> Progressio Tuition will work on any device to send messages with clients and find information. However, in order to use the online lesson space you will need to be using a desktop computer, laptop or tablet.</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq_sec_main con_sec_chg bg-gray">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="heading_faq">
                    <h2>General Queries</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="faq_content_tab">
                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> How long can I continue to be a tutor?</h2>
                        <p><span>A:</span> You can be a tutor at Progressio Tuition for as long as you would like to! However, most of our tutors we anticipate going off to find full-time jobs elsewhere, this keeps our tutoring body young, new and eager!</p>
                    </div>

                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> Will I be able to get plenty of work?</h2>
                        <p><span>A:</span> While we cannot guarantee work, we try to ensure that the available work is distributed as equally as we can where we are able to. If you are accepted as a tutor at Progressio Tuition it means we have great faith in your abilities, so we expected all of our tutors to be able to find plenty of pupils.</p>

                        <p>Please note that certain periods will naturally be a lot quieter than others. The September/October period will of course be busier than the Summer holidays. As a new tutor with no experience, it can also take a little bit longer to build up a profile, but after a few months you will probably start having to turn people down!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="faq_content_tab">
                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> Do I need an Enhanced DBS check to tutor?</h2>
                        <p><span>A:</span> Yes. All Progressio Tuition tutors are required to have an Enhanced DBS check. If you do not already have one, we will be able to sort one out for you that you will slowly pay back as you earn (this is to ensure that you never have to pay anything unless you are earning). We will provide you with more details on this during the short application process. </p>

                    </div>

                    <div class="faq_list_Sec">
                        <h2><span>Q:</span> How can I find out more?</h2>
                        <p><span>A:</span> You can drop us an email or have a look at the ‘Become a Tutor’ page <a href="#">here.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faq Section End -->
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