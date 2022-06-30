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
<section class="tutor_application_form">
<div class="container">
	<div class="row">
		<div class="tutor_application_head">
			<div class="row">
				<div class="col-md-6">
					<div class="tutor_head_sec">
						<h2>Tutor Application Step 4:</h2>
						<small></small>
					</div>
				</div>
			</div>
		</div>

		<div class="tutor_form_sec">
			<form enctype="multipart/form-data" method="POST" action="{{route('tutor.step4save')}}">
			@csrf
				<div class="row">
					<div class="col-md-6">
						<label>Meeting Date</label>
						<input type="date" name="date" class="form-control" />
					</div>
					<div class="col-md-6">
						<label>Meeting Time</label>
						<input type="time" name="time" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 align-items-center">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="form-btn text-center">
									<input type="submit" value="Next">
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

</script>
@endsection