@extends('layouts.main')
@section('content')
@include('extends.faqhead',['menu'=>'faqparentguardian','faqname'=>'FAQ'])

<!-- Faq Section Begin -->

<section class="faq_sec_main con_sec_chg">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span>  How does it work?</h2>
							<p><span>A:</span>  Progressio Tuition is an online tutoring platform that connects pupils with tutors from across the UK. All of our tutors undergo our rigorous training programme and are able to provide tailored lessons to meet a pupil’s needs. Progressio Tuition provide an online lesson space and interactive chat functions so that you can do everything from finding a great tutor, to taking part in lessons, to sorting out bookings all on site. How easy is that!</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> Who are the tutors?</h2>
							<p><span>A:</span> Our tutors are all young adults with a passion for education. They are all drawn from the UK’s top universities and passed our rigorous interview and training programme. In addition to that, they have Enhanced DBS checks, have undertaken NSPCC training and have an A/A* (or equivalent) in their subjects</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span>   Can I try it before I pay?</h2>
							<p><span>A:</span> Definitely! We guarantee that you will not pay a single penny until you have decided on a tutor and wish to book some real lessons.</p>

							<p>We also offer completely free of charge seminars throughout the year. Check it <a href="">out here.</a></p>

						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span>  How much does it cost?</h2>
							<p><span>A:</span> Tutors set their own prices, and these range from £18-£38 depending on their experience. If you would like to find out more, please <a href="">see here.</a></p>
						</div>


					</div>
				</div>

				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span> How does the online lesson space work?</h2>
							<p><span>A:</span> All lessons are completed in Progressio Tuition’s unique online lesson space that you can access from your ‘Bookings’ tab up to one minute before your lesson starts. This has all the tools that an in-person tutor would have and then some more! When you attend a free ‘Meet the Tutor’ session you will be able to try out the features or ask a tutor how it works. Some of the features include a video call, message chat, whiteboard, maths tools, a word processor, image uploader and much more... </p>

						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span>How do I sign up?</h2>
							<p><span>A:</span> If you would like to book a free ‘Meet the Tutor’ session, then you can do so by clicking the bottom on the top right of your screen and following the instructions to sign up. We will then take your name and email and guide you through the process.</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> Does a Parent/Guardian need to sign up on behalf of the pupil?</h2>
							<p><span>A:</span>  If the pupil is under 18 then you will need to create a ‘Parent or Guardian Account’ which will then enable you to create a ‘Pupil Account’. Parents and Guardians can manage bookings, make payments and talk to the tutors on their account, and pupils can attend lessons and communicate documents and messages with their tutor on their account.</p>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Faq Section End -->

<section class="univer_sec_main pt-5 pb-5 find-tutor-sec bg-white">
	<div class="container-fluid">
		<div class="row no-gutters">
			<div class="col-md-6">
				<div class="uni_left_img">
					<img src="{{asset('images/find-tutor-sec-bg.jpg')}}" class="img-responive" alt="">
				</div>
			</div>

			<div class="col-md-6">
				<div class="uni_content_tab">
					<div class="interveiw_process">
						<h2>How do I find a tutor?</h2>
					</div>

					<div class="uni-list-main">
						<div class="uni-list-con">
							<div class="row align-items-center">
								<div class="col-md-2">
									<div class="uni-icon-box">
										<img src="{{asset('images/uni-icon-img-01.png')}}" class="img-responive" alt="icon">
									</div>
								</div>

								<div class="col-md-10">
									<div class="uni-box-con">
										<span>How do I browse tutors?</span>
										<p>Finding a tutor is similar to doing a Google search. If you click here you can find lots of search features to help narrow down the search.</p>
										<p>If you are struggling to find the perfect tutor, or you just want a helping hand, feel free to give us a call, email or send us an instant message.</p>
									</div>
								</div>
							</div>
						</div>

						<div class="uni-list-con">
							<div class="row align-items-center">
								<div class="col-md-2">
									<div class="uni-icon-box">
										<img src="{{asset('images/uni-icon-img-02.png')}}" class="img-responive" alt="icon">
									</div>
								</div>

								<div class="col-md-10">
									<div class="uni-box-con">
										<span>Can I talk to tutors before paying?</span>
										<p>As always, you can set up free ‘Meet the Tutor’ sessions to ensure that you never pay a penny until you are happy that you have picked the perfect tutor.</p>
									</div>
								</div>
							</div>
						</div>

						<div class="uni-list-con">
							<div class="row align-items-center">
								<div class="col-md-2">
									<div class="uni-icon-box">
										<img src="{{asset('images/uni-icon-img-03.png')}}" class="img-responive" alt="icon">
									</div>
								</div>

								<div class="col-md-10">
									<div class="uni-box-con">
										<span>What do I do if I get no responses from tutors?</span>
										<p>If you do not receive a response from a tutor, you are always free to talk to as many as you like. Alternatively, if you would like us to contact the tutor to find out why you have not had a response then please let us know.</p>
									</div>
								</div>
							</div>
						</div>

						<div class="uni-list-con">
							<div class="row align-items-center">
								<div class="col-md-2">
									<div class="uni-icon-box">
										<img src="{{asset('images/uni-icon-img-04.png')}}" class="img-responive" alt="icon">
									</div>
								</div>

								<div class="col-md-10">
									<div class="uni-box-con">
										<span>What subjects are offered?</span>
										<p>Our tutor community is extremely diverse and, as such, you can probably find almost anything! We have a focus on the core subjects such as English, Maths, the Sciences, History, Geography and so on. However, if you are looking for specific subjects like Law, Languages, Music, PE, then chances are you can find a good selection of great tutors to choose from.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="faq_sec_main con_sec_chg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading_faq">
					<h2>How do I deal with bookings & rescheduling?</h2>
				</div>
			</div>
			<div class="col-md-6">
				<div class="faq_content_tab">
					<div class="faq_list_Sec">
						<h2><span>Q:</span>  What is a free ‘Meet the Tutor’ session?</h2>
						<p><span>A:</span>  This is a meeting that you can book with a tutor to decide if you would like them to tutor for you. They are completely free of charge so that you can talk to as many tutors as you would like to prior to committing to one.</p>
					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span> How do I book a free ‘Meet the Tutor’ session?</h2>
						<p><span>A:</span> When you have created an account and clicked on a tutor’s profile, you will be able to send them a message and request a time to set up a free ‘Meet the Tutor’ meeting. Alternatively, you could just set up a meeting and let the tutor send you a meeting request which you can accept.</p>
					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span>   When I have found a tutor, how do I book lessons?</h2>
						<p><span>A:</span> Booking lessons is really easy. You can either suggest a time for lessons yourself, or you can just ask your tutor to send a request for a specific day and time which you can then accept. You can automatically set meetings to run weekly to save you the time and effort of rebooking each week too!</p>

					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span>  How do I decide how often to have lessons?</h2>
						<p><span>A:</span> Typically, one lesson per week per subject is what people tend to go for. That said, if you are worried about being behind, or in the leadup to an important test, it might be worth getting your tutor’s advice or speaking to a teacher at school as to what they think is best.</p>
					</div>


					<div class="faq_list_Sec">
						<h2><span>Q:</span>  Do I need to make any commitments?</h2>
						<p><span>A:</span> Not at all! We guarantee that you never need to commit to doing a certain number of lessons, you have the absolute power to decide how often you want to have lessons with your tutor.</p>
					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span>  Do I need to book more than one lesson at a time?</h2>
						<p><span>A:</span> No, you can book each lesson one at a time if you would like, but most people prefer to set up a recurring weekly lesson to save themselves the time and effort of rebooking each week.</p>
					</div>


				</div>
			</div>

			<div class="col-md-6">
				<div class="faq_content_tab">
					<div class="faq_list_Sec">
						<h2><span>Q:</span> How do I ensure the booking is confirmed?</h2>
						<p><span>A:</span> Bookings are confirmed once the payment for the lesson has been made. The lesson will clearly say ‘Confirmed’. If your lesson is not confirmed, then the lesson will automatically cancel when the start time occurs. If you are having any difficulties, please contact us so that we can help you iron out the problem. </p>

					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span> How do I reschedule a booked lesson?</h2>
						<p><span>A:</span> If you have a change of plan and need to move a lesson, then you may do this at any time as long as it is 12 hours prior to the start time. You can do this by clicking on the booking in your ‘Bookings’ area and clicking ‘Reschedule’, from there you can follow the instructions to rearrange! Your tutor will then confirm (or suggest an alternative) depending on their availability.</p>

						<p>If you wish to reschedule within 12 hours of the start time, you will need to speak with your tutor to discuss whether this is possible.</p>
					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span> How do I cancel a booked lesson?</h2>
						<p><span>A:</span>  Cancellations may be made by clicking on the booking you would like to cancel in your ‘Bookings’ area. Once you click on the booking, you should be able to click ‘Cancel’. You will receive a full refund if you have already paid, though the small booking fee is non-refundable. </p>

						<p>If you wish to cancel within 12 hours of the start time, you will need to speak with your tutor to discuss whether this is possible.</p>
					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span> What happens if my tutor cancels the lesson?</h2>
						<p><span>A:</span>  Our tutors always do their best to meet their commitments. In the rare event that a tutor has to cancel the lesson you will receive a full refund. If you have any concerns, please feel free to contact us directly.</p>
					</div>

					<div class="faq_list_Sec">
						<h2><span>Q:</span> How do I enter the lesson space to start my lesson?</h2>
						<p><span>A:</span> Pupils may enter their lesson up to five minutes before the start time. At this time, pupils can log into their account, go to their ‘Bookings’ area and a button saying ‘Start’ should appear. Upon clicking on that, the pupil will be taken to the lesson space where their tutor will join them.</p>
					</div>


				</div>
			</div>
		</div>
	</div>
</section>


<!-- Tution Cost Section Begin -->

	<section class="tution_cost_sec">
		<img src="{{asset('images/tution-session-bg.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="tution_cost_box">
						<h2>How much does <br> tuition cost?</h2>
						<p>Tutors set their own prices, and these range from £18-£38 depending on their experience. If you would like to find out more, please <a href="">click here.</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Tution Cost Section End -->


<section class="faq_sec_main con_sec_chg">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="faq_content_tab">

						<div class="head_faq">
							<h2>Can I leave reviews?</h2>
						</div>
						<div class="faq_list_Sec">
							<h2><span>Q:</span> How can I review my tutor?</h2>
							<p><span>A:</span> You are always able to leave your tutor a review. This can be as a star rating (out of five) and you may also leave a comment that will go on the tutor’s public profile. Your first name will be displayed, but no other identifying features will be included.</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> Can I review Progressio Tuition?</h2>
							<p><span>A:</span> Of course! We always appreciate your feedback so that we can make Progressio Tuition even better. Please find us on Trustpilot to leave a <a href="">review</a> </p>
						</div>

						<div class="head_faq">
							<h2>How safe is Progressio Tuition?</h2>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span>  How can I be sure that tutors are safe to work with children?</h2>
							<p><span>A:</span> At Progressio Tuition we take safeguarding and child protection very seriously. That is why we have developed a thorough safeguarding policy and privacy policy. In addition to this, our tutors all undergo a full course delivered by the NSPCC.</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span>  How does Progressio Tuition ensure that it is safe online?</h2>
							<p><span>A:</span>Our website has been decided in accordance with all of the relevant legislation and we process data in a way which is fully compliant with all relevant regulation. To find out more, please see our <a href="">privacy policy</a></p>
						</div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="head_faq">
							<h2>How can I communicate with my tutor?</h2>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> How do I talk to my tutor within the lesson space?</h2>
							<p><span>A:</span> The online lesson space allows you to communicate through a video call so that you and your tutor can freely talk and gesture. You also have the option to use a chat box. In addition to this, the workspace has a variety of tools such as a whiteboard and word processor for you and your tutor to use together.</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> Can I talk to my tutor outside the lesson space?</h2>
							<p><span>A:</span> Absolutely! Communication is key between pupil-tutor and parent/guardian-tutor. Your tutor will have a message conversation with both Parent/Guardians and pupils. You can send messages, attach documents and images, and sort out new bookings together easily.</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> How do I send and receive documents to/from my tutor?</h2>
							<p><span>A:</span> Sometimes you may need your tutor to send you a document (for homework, revision materials and so on), these will just show up in that chat for you to click and download. If you would like to send the tutor a document (such as an image, word document, PDF and so on)</p>
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
						<h2>Help! I have technical problems</h2>
					</div>
				</div>

				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span>   How do I sign up?</h2>
							<p><span>A:</span> If you would like to book a free ‘Meet the Tutor’ session, then you can do so by clicking the bottom on the top right of your screen and following the instructions to sign up. We will then take your name and email and guide you through the process.</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> I have another technical problem!</h2>
							<p><span>A:</span> If you are experiencing technical problems, please double check that your microphone and sound are working properly. If they’re working, check that your wi-fi router is running up to speed (for example, a BT Home Hub might be flashing orange if your internet is down). </p>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span> What should I do if I cannot hear/see my tutor in the lesson space?</h2>
							<p><span>A:</span> If you are experiencing technical problems, please double check that your microphone and sound are working properly. If they’re working, check that your wi-fi router is running up to speed (for example, a BT Home Hub might be flashing orange if your internet is down).  </p>

							<p>If you are still experiencing technical problems, please give us a call so that we can help you ASAP.</p>

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