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
						<h2>Tutor Application Step 3:</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="tutor_form_sec">
			<form enctype="multipart/form-data" method="POST" action="{{route('tutor.step3save')}}">
			@csrf
				<div class="row">
					<div class="col-md-6">
						<label>Profile Picture</label>
						<input type="file" name="profile_picture" required />
						{{Helper::errorField('profile_picture',$errors)}}
					</div>
					<div class="col-md-6"></div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Passport / National ID / Driving License (any with front & Back)</label>
						<input type="file" name="identity_proof[]" multiple />
						{{Helper::errorField('identity_proof',$errors)}}
					</div>
					<div class="col-md-6"></div>
				</div>
				<h3>Bank Account Details</h3>
				<div class="row">
					<div class="col-md-6">
						<label>Bank name</label>
						<input type="text" value="{{old('bank_name')}}" name="bank_name"  />
						{{Helper::errorField('bank_name',$errors)}}
					</div>
					<div class="col-md-6">
						<label>Account name</label>
						<input type="text" value="{{old('account_name')}}" name="account_name"  />
						{{Helper::errorField('account_name',$errors)}}
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Sort code</label>
						<input type="text" value="{{old('sort_code')}}" name="sort_code"  />
						{{Helper::errorField('sort_code',$errors)}}
					</div>
					<div class="col-md-6">
						<label>Account Number</label>
						<input type="text" value="{{old('account_number')}}" name="account_number"  />
						{{Helper::errorField('account_number',$errors)}}
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