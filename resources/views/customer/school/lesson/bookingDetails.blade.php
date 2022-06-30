@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 pt-5 pb-5">
        <div class="dashborad_main_sec">
          <div class="row">
            <div class="col-md-12">
              <div class="dash_head_sec">
                <h2>Teacher Request</h2>
              </div>
            </div>
          </div>

          <div id="tutorbookingapp" class="upcoming_lesson_tab">
		  <form id="finalizeBookingForm" method="POST" action="{{route('school.tutor.schedule.finalizeBooking')}}">
			@csrf
				@foreach($data['pupils'] as $dat)
				@php
					$pupil = App\Model\User::find($dat);
					$subject = Helper::returnFlag($data['subject_id']);
				@endphp
				<div class="row mb-3">
					<div class="col-md-6">
						<p><b>Pupil Name: </b>{{$pupil->name}}</p>
						<p><b>Subject: </b>{{$subject}}</p>
						<p><b>Current Grade: </b><input class="form-control" type="text" name="pupil_current_grade[{{$dat}}]" value="" /></p>
						{{Helper::errorField('pupil_current_grade.'.$dat,$errors)}}
						<p><b>Target Grade: </b><input class="form-control" type="text" name="pupil_target_grade[{{$dat}}]" value="" /></p>
						{{Helper::errorField('pupil_target_grade.'.$dat,$errors)}}
						<p><b>Exam Board: </b><textarea class="form-control" rows="3" cols="3" name="exam_board[{{$dat}}]"></textarea></p>
						{{Helper::errorField('exam_board.'.$dat,$errors)}}
						<p><b>Advice for working with this pupil: </b><textarea class="form-control" placeholder="Advice for working with this pupil" rows="3" cols="3" name="advice[{{$dat}}]"></textarea></p>
					</div>
					<div class="col-md-6">
					<p><b>Lesson Notes: </b></p>
						<textarea name="notes[{{$dat}}]" class="form-control" rows="12" cols="6" placeholder="Our tutors have been trained to follow your guidance (specific or more general) to get the best results. 

	E.g. Pupil needs to work primarily on his XYZ. It would be useful if you could start by looking at XYZ (especially XYZ) and, once you have covered that, perhaps see if you can give him some guidance on XYZ.
	"></textarea>
					</div>
				</div>
				@endforeach
				<div class="row">
					<div class="col-md-12">
						<button onclick="takeConfirmation()" type="button" class="btn btn-success">Finalize Booking</button>
					</div>
				</div>
			</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('css')
<style type="text/css">
.messages_das_sec{
	background: white;
}
.dashborad_main_sec .row:after{
	content: unset;
}
</style>
@endsection
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
function takeConfirmation(){
	swal({
	  title: "Are you sure?",
	  text: "Have you checked all the details carefully before finalizing booking?",
	  icon: "info",
	  button: {
		text: "Finalize",
		closeModal: false,
	  },
	})
	.then((willDelete) => {
	  if (willDelete) {
		$('#finalizeBookingForm').submit()
	  } else {
		swal("Take your time to finalize the details");
	  }
	});
}
</script>
@endsection