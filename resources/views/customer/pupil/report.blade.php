@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 pt-5 pb-5">
        <div class="dashborad_main_sec">
          <div id="tutorbookingapp" class="upcoming_lesson_tab">
				@foreach($booking->pupils as $dat)
				@php
					$pupil = App\Model\User::find($dat->pupil_id);
					$subject = Helper::returnFlag($booking->subject_id);
				@endphp
				<div class="row">
					<div class="col-md-12">
					  <div class="dash_head_sec">
						<h2>Teacher Request</h2>
					  </div>
					</div>
				  </div>
				<div class="row mb-3">
					<div class="col-md-6">
						<p><b>Pupil Name: </b>{{$pupil->name}}</p>
						<p><b>Subject: </b>{{$subject}}</p>
						<p><b>Current Grade: </b>{{$dat->current_grade}}</p>
						<p><b>Target Grade: </b>{{$dat->target_grade}}</p>
						<p><b>Exam Board: </b>{{$dat->advice}}</p>
						<p><b>Advice for working with this pupil: </b>{{$dat->exam_board}}</p>
					</div>
					<div class="col-md-6">
					<p><b>Lesson Notes: </b></p>
					{{$dat->notes}}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					  <div class="dash_head_sec">
						<h2>Lesson Report</h2>
					  </div>
					</div>
				  </div>
				<div class="row mb-3">
					<div class="col-md-6">
						<p><b>Lesson Title: </b><input class="form-control" disabled type="text" name="lesson_title[{{$dat->id}}]" value="{{$dat->lesson_title}}" /></p>
						<p><b>What we covered: </b><input class="form-control" disabled type="text" name="what_covered[{{$dat->id}}]"  value="{{$dat->what_covered}}" /></p>
					</div>
				</div>
				<hr>
				@endforeach
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
<script type="text/javascript">

</script>
@endsection