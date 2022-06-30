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
					<h2>Parent Registration</h2>
					<p>We are always looking for new tutors to join us at Progressio Tuition! If you have a strong set of A-Levels (or equivalent) and you are currently studying at a top UK university (or you already graduated) then we would love to have you on board. </p>
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
				<div class="col-md-12">
					<div class="tutor_head_sec">
						<h2>Parent Registration Form:</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="tutor_form_sec">
			<form class="CrudForm" id="inquiry_form" data-noinfo="true" data-customcallback="inquiry_success" data-customcallbackFail="inquiry_error" method="POST" action="{{route('parent.register.store')}}">
			@csrf
				<div class="row">
					<div class="col-md-12">
						<label>Enter Your Name</label>
						<input type="text" name="name" placeholder="Your Name" required="">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>Phone Number</label>
						<input type="phone" name="phone" placeholder="Your Phone Number">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>Enter Your Email</label>
						<input type="email" name="email" placeholder="Your Email" required="">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<label>Enter Password</label>
						<input type="password" name="password" placeholder="Your Password" required="">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 align-items-center">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="radio">
								  <label><input required type="radio" name="accept_terms">I Accept Terms & Conditions</label>
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
  generateNotification('1', 'Registration Completed, you can now login');
  setTimeout(function(){
	  window.location.href='{{route('login')}}';
  },1000)
}
}
</script>
@endsection