@extends('layouts.main')
@section('content')
<!-- Banner Section Begin -->
<section class="banner_sec_main con_sec_chg">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="banner_img_sec">
					<img src="{{asset('images/become-a-tutor-bg.jpg')}}" class="img-responive" alt="Banner Image">
				</div>
			</div>

			<div class="col-md-3">
				<div class="banner_form_sec">
					<h2>Become a tutor</h2>
					<p>We are always looking for new tutors to join us at Progressio Tuition! If you have a strong set of A-Levels (or equivalent) and you are currently studying at a top UK university (or you already graduated) then we would love to have you on board. </p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="become_tutor_main">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="become_tutor_content text-center">
				<p>You’ll need to watch a few videos that will guide you through the process after you have filled in the form below. Before you do that though, why not find out why you should become a tutor? Here are some of the best reasons...</p>
			</div>
		</div>

		<div class="become_tutor_list">
			<div class="row">
				<div class="col-md-6">
					<div class="tutor_list_tab">
						<ul>
							<li>You can <b>work from home</b> or anywhere else for that matter! That means no bus or train fees, no wasting money on that extra morning coffee, and no time wasted travelling</li>
							<li><b>Choose your own</b> hours. That one is self-explanatory, but it’s a massive perk of the job.</li>
							<li>It’s so <b>rewarding to make a difference</b> to a pupil’s life. You will be a part of helping pupils achieve their dreams of work and university </li>
						</ul>
					</div>
				</div>

				<div class="col-md-6">
					<div class="tutor_list_tab">
						<ul>
							<li>You’ll <b>get money into your account fortnightly</b> rather than having to wait for the traditional month between receiving your earnings</li>

							<li><b>Earn up to £29 an hour</b> and beyond. Even when you get started, you’ll be earning more than the national living wage (and way more than the minimum wage). Not many part-time jobs can offer you that!</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="tutor_application_form">
<div class="container">
	<div class="row">
		<div class="tutor_application_head">
			<div class="row">
				<div class="col-md-6">
					<div class="tutor_head_sec">
						<h2>Tutor Application Form:</h2>
					</div>
				</div>

				<div class="col-md-6">
					<div class="tutor_form_links">
						<ul>
							<li>
								<a href="#"><span><img src="{{asset('images/uni-icon-img-01.png')}}" class="img-responive" alt=""></span></a>
							</li>

							<li>
								<a href="#"><span><img src="{{asset('images/uni-icon-img-02.png')}}" class="img-responive" alt=""></span></a>
							</li>

							<li>
								<a href="#"><span><img src="{{asset('images/uni-icon-img-03.png')}}" class="img-responive" alt=""></span></a>
							</li>

							<li>
								<a href="#"><span><img src="{{asset('images/uni-icon-img-04.png')}}" class="img-responive" alt=""></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="tutor_form_sec">
			<form class="CrudForm" id="inquiry_form" data-noinfo="true" data-customcallback="inquiry_success" data-customcallbackFail="inquiry_error" method="POST" action="{{route('tutor.step1save')}}">
			@csrf
				<div class="row">
					<div class="col-md-6">
						<label>Enter Your Name</label>
						<input type="text" name="name" placeholder="Your Name" required="">
					</div>

					<div class="col-md-6">
						<label>Date of Birth</label>
						<input type="date" name="birth" placeholder="Your Name" required="">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<label>University & Year <!--<i>(if not completed)</i>--></label>
						<div class="row">
							<div class="col-md-6">
								<select name="university" required="">
									<option value="">University</option>
									@foreach($universities as $university)
									<option value="{{$university->id}}">{{$university->flag_value}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-6">
								<select name="year" required="">
									<option value="">Year</option>
									@for($i=(date('Y')-30);$i<=date('Y');$i++)
									<option value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<label>Phone Number</label>
						<input type="phone" name="phone" placeholder="Your Phone Number">
					</div>
					<div class="col-md-3">
						<label>Enhanced DBS Check</label>
						<select name="enhanced">
							<option value="Yes">Yes</option>
							<option selected value="No">No</option>
						</select>
					</div>
				</div>

				<div class="row">
					

					<div class="col-md-6">
						<label>What subjects would you like to tutor?</label>
						<select name="subject" required="">
							<option value="">Subject</option>
							@foreach($subjects as $subject)
							<option value="{{$subject->id}}">{{$subject->flag_value}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<label>Enter Your University Email Address</label>
						<input type="email" name="email" placeholder="Your University Email" required="">
					</div>
				</div>

				<div class="row">
					{{--
					<div class="col-md-6">
						<label>How many hours per week would you like to tutor?</label>
						<select name="hour" required>
							@for($i=1;$i<10;$i++)
								<option value="{{$i}}" {{$i==9?"selected":('')}}>{{$i}}h</option>
							@endfor
						</select>
					</div>
					--}}
				</div>
				<div class="row">
					<div class="col-md-6 align-items-center">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="radio">
								  <label><input type="radio" id="schoolCheck">Do you Teach in any school?</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="schoolDetail" style="display: none;">
					<div class="col-md-6">
						<label>Select School where you teach?</label>
						<select name="school_id" >
							<option selected disabled>School</option>
							@foreach($school as $sch)
							<?php $detail = App\Model\User::where('id',$sch->school_id)->first(); ?>
							<option value="{{$detail->id}}">{{$detail->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<label>School Name(if not listed)</label>
						<input type="text" name="school_name" placeholder="Your School name">
					</div>
					<div class="col-md-3">
						<label>School Email(if not listed)</label>
						<input type="email" name="school_email" placeholder="Your School Email">
					</div>
					<div class="col-md-3">
						<label>School Area(if not listed)</label>
						<input type="text" name="school_area" placeholder="Your School Area">
					</div>
					<div class="col-md-3">
						<label>School Postal Code(if not listed)</label>
						<input type="text" name="school_postal_code" placeholder="Your School Postal Code">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Brief description <i>(include something that you think would make you a great tutor)</i></label>

						<textarea name="brief_description" required placeholder="A Detailed Description Goes Here"></textarea>
					</div>
					<div class="col-md-6">
						<label>How did you hear about us?</i></label>

						<textarea name="hear_about_us" placeholder="A Detailed Description Goes Here"></textarea>
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<label>Referal code <i>(if applicable)</i></label>
						<input type="text" name="referal" placeholder="****************">
					</div>

					<div class="col-md-6 align-items-center">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="radio">
								  <label><input required type="radio" name="accept_terms">I Accept Terms & Conditions</label>
								  <label><input required type="checkbox" name="employed_right">I have a right to be self-employed in the UK</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-btn">
									<input type="submit" value="Submit">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
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
function inquiry_error(res) {
if (res) {
  if (isJSON(res)) {
	res = JSON.parse(res);
	if (res.errors) {
	  var _errors = '';
	  for (j in res.errors) {
		_errors += res.errors[j].join('</br>') + '</br>';
	  }
	  generateNotification('0', _errors);
	}
  }
}
}

function inquiry_success(_msg) {
if (_msg.status) {
  generateNotification('1', 'Step 1 Registration Completed');
  window.location.href='{{route('tutor.step2')}}';
}
}
$("#schoolCheck").click(function() {
	$("#schoolDetail").css("display", '')
	console.log($(this));
});

</script>
@endsection