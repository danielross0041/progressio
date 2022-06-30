@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
  <div id="panelapp" class="container">
    <div class="row">
      @include('customer.sidebar')
      <div class="col-md-9 pt-5 pb-5">
        <div class="dashborad_main_sec">
          <div class="row">
            <div class="col-md-12">
              <div class="dash_head_sec">
                <h2>{{$title}}</h2>
				<p>Update your profile to get into rating criteria of teachers/school</p>
              </div>
            </div>
          </div>
		  <form class="CrudForm" id="inquiry_form" data-noinfo="true" data-customcallback="inquiry_success" data-customcallbackFail="inquiry_error"  method="POST" action="{{route('teacher.updateprofile')}}">
			  @csrf
			  <div class="row mt-2">
				<div class="col-md-6">
					<label>Profile Picture</label>
					<input onchange="showPreview(this)" type="file" name="profile_picture" class="form-control" />
					@if(Auth::user()->profile_image!="")
						<img alt="Profile Image" src="{{asset(Auth::user()->profile_image)}}" id="profile_picture_preview" class="img-thumbnail mt-2" width="150" />
					@else
						<img src="" alt="Profile Image" id="profile_picture_preview" class="img-thumbnail mt-2" width="150" />
					@endif
				</div>
				<div class="col-md-6">
					<label>Full Name</label>
					<input type="text" value="{{Auth::user()->name}}" name="name" class="form-control" disabled="true" />
				</div>
			  </div>
			  <div class="row mt-2">
				<div class="col-md-6">
					<label>Email</label>
					<input type="email" value="{{Auth::user()->email}}" name="email" disabled="true" class="form-control" />
				</div>
				<div class="col-md-6">
					<label>Phone Number</label>
					@if(isset(Auth::user()->tutordetail->phone))
					<input value="{{Auth::user()->tutordetail->phone}}" type="phone" name="phone" disabled="true" placeholder="Your Phone Number" class="form-control">
					@else
					<input value="" type="phone" name="phone"  placeholder="Your Phone Number" class="form-control">
					@endif
					
				</div>
			  </div>
			  <div class="row mt-2">
				<div class="col-md-6">
					<label>University</label>
					
					<select class="form-control" name="university" {{(isset(Auth::user()->tutordetail->university))?('disabled'):""}} >
						<option value="">Select University</option>
						@foreach($universities as $university)
							<option {{(isset(Auth::user()->tutordetail->university))?(Auth::user()->tutordetail->university==$university->id?'selected':''):''}} value="{{$university->id}}">{{$university->flag_value}}</option>
						@endforeach
					</select>
					
				</div>
				<div class="col-md-6">
					<label>University Year</label>
					
					<select class="form-control" required name="year" {{(isset(Auth::user()->tutordetail->year))?('disabled'):""}}>
						<option value="">Year</option>
						@for($i=(date('Y')-30);$i<=date('Y');$i++)
						<option {{(isset(Auth::user()->tutordetail->year))?(Auth::user()->tutordetail->year==$i?'selected':''):''}} value="{{$i}}">{{$i}}</option>
						@endfor
					</select>
				</div>
			   </div>
			   

			   <!-- @if(Auth::user()->tutorsubjects)
				   $subjectsSelected = Auth::user()->tutorsubjects->pluck('subject_id')->toArray();
			   @else
				   $subjectsSelected[] = Auth::user()->tutordetail->subject;
			   @endif -->
			   @php
			   $subjectsSelected = [];
			   $subjectsSelected[] = (isset(Auth::user()->tutordetail->subject))?(Auth::user()->tutordetail->subject):'';
			   @endphp
				
			   
			   <div class="row mt-2">
					<div class="col-md-6">
						<label>What subjects would you like to tutor?</label>
						<select class="form-control" name="subject" required="">
							@foreach($subjects as $subject)
							<option <?=in_array($subject->id,$subjectsSelected)?'selected':''?> value="{{$subject->id}}">{{$subject->flag_value}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<label>Birth Date</label>
						<input value="{{(isset(Auth::user()->tutordetail->birth_date))?(Auth::user()->tutordetail->birth_date):''}}" type="date" name="birth_date" placeholder="Your Birthday" required="" class="form-control" {{(isset(Auth::user()->tutordetail->birth_date))?('disabled'):""}} >
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-6">
						<label>Per Hour Price £</label>
						<input value="{{(isset(Auth::user()->tutordetail->per_hour_price))?(Auth::user()->tutordetail->per_hour_price):''}}" type="number" step="any" name="per_hour_price" placeholder="Per Hour £" required="" class="form-control">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-6">
						<label>Brief description <i>(include something that you think would make you a great tutor)</i></label>

						<textarea class="form-control" name="brief_description" required placeholder="A Detailed Description Goes Here">{{(isset(Auth::user()->tutordetail->brief_description))?(Auth::user()->tutordetail->brief_description):''}}</textarea>
					</div>
					@if(Auth::user()->user_type !==1)
					<div class="col-md-6">
						<label>How did you hear about us?</i></label>
						<textarea class="form-control" name="hear_about_us" placeholder="A Detailed Description Goes Here" disabled="true">{{Auth::user()->tutordetail->hear_about_us}}</textarea>
						
					</div>
					@endif
				</div>
				<div class="row mt-2">
					<div class="col-md-6">
						<button class="btn btn-success" type="submit">Update Profile</button>
					</div>
				</div>
			</form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('css')
<style type="text/css">

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
if(_msg.status==1){
  generateNotification('1', 'Profile Updated');
}else{
	generateNotification('0', _msg.data);
}
}else{
	generateNotification('0', _msg.data);
}
}
</script>
@endsection