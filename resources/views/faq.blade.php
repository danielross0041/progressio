@extends('layouts.main')
@section('content')
@include('extends.faqhead',['menu'=>'faq','faqname'=>'FAQ'])


<!-- Faq Section Begin -->

	<section class="faq_sec_main con_sec_chg">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span> What is Progressio Tuition?</h2>
							<p><span>A:</span> Progressio Tuition is an online tutoring platform that connects pupils with tutors from across the UK. All of our tutors undergo our rigorous training programme and are able to provide tailored lessons to meet a pupil’s needs. Progressio Tuition provide an online lesson space and interactive chat functions so that you can do everything from finding a great tutor, to taking part in lessons, to sorting out bookings all on site. How easy is that!</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> How do I find the perfect tutor?</h2>
							<p><span>A:</span> Finding a tutor is similar to doing a Google search. If you <a href="#">click here</a> you can find lots of search features to help narrow down the search. Finding the tutor that works for you is key. That is why we make sure that only the best tutors pass the interview process to tutor here. Additionally, we ensure that you are always able to meet your tutors in the lesson space completely free of charge until you find the perfect one for you.</p>

							<p>If you are struggling to find the perfect tutor, or you just want a helping hand, feel free to give us a call, email or send us an instant message.</p>
						</div>


					</div>
				</div>

				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span> Why should I use online tuition?</h2>
							<p><span>A:</span> Traditional tuition always relied on you living near the perfect tutor and not having much choice. With Progressio Tuition you can have access to some of the UK’s best tutors all from the comfort of your home! There are also some amazing statistical benefits to tuition. For example, a term of weekly lessons will on average increase your performance by a whole grade.</p>

							<p>Also, when you join Progressio Tuition, we have a team working full-time to assist you behind the scenes. If you ever have a question, we would love to take your call or respond to your email. We pride ourselves on ensuring that you receive the best customer service, so you will always talk to a real person and never a ‘bot’.</p>
						</div>

						<div class="faq_list_Sec">
							<h2><span>Q:</span> How are lessons delivered?</h2>
							<p><span>A:</span> All lessons are completed in Progressio Tuition’s unique online lesson space that you can access from your ‘Bookings’ tab up to five minutes before your lesson starts. This has all the tools that an in-person tutor would have and then some more! When you attend a free ‘Meet the Tutor’ session you will be able to try out the features or ask a tutor how it works. Some of the features include a video call, message chat, whiteboard, maths tools, a word processor, image uploader and much more...</p>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Faq Section End -->


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

<!-- Faq Section Begin -->

	<section class="faq_sec_main con_sec_chg">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span> Can I have group lessons instead of one-to-one?</h2>
							<p><span>A:</span> Of course! Progressio Tuition are leading the market in terms of facilitating multi-pupil lessons to everyone.We do recommend that only pupils of similar age and ability use these so it might be fun to get pupils paired up with school friends that are in similar sets at school. The world is your oyster!</p>

							<p>Of course! Progressio Tuition are leading the market in terms of facilitating multi-pupil lessons to everyone.We do recommend that only pupils of similar age and ability use these so it might be fun to get pupils paired up with school friends that are in similar sets at school. The world is your oyster!</p>

						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="faq_content_tab">
						<div class="faq_list_Sec">
							<h2><span>Q:</span> What subjects are offered?</h2>
							<p><span>A:</span> Our tutor community is extremely diverse and, as such, you can probably find almost anything! We have a focus on the core subjects such as English, Maths, the Sciences, History, Geography and so on. However, if you are looking for specific subjects like Law, Languages, Music, PE, then chances are you can still find a good selection of great tutors to choose from.</p>

							<p>Want us to find you a niche subject tutor? Contact us and we will go on a head hunt to find a tutor for you. Where there is a will, there is a way!</p>
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