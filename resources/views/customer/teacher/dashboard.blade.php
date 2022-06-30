@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
  <div class="container">
    <div class="row">
      @include('customer.sidebar')
      <div class="col-md-9 pt-5 pb-5">
		<div class="dashborad_main_sec">
			<div class="row">
				<div class="col-md-6">
					<div class="dash_head_sec">
						<h2>{{isset($modifyTitle)?$modifyTitle:'Upcoming Bookings'}}</h2>
					</div>
				</div>

				<div class="col-md-6">
					<div class="des-pagination">
						<span>Page   {{$results->currentPage()}} / {{$results->lastPage()}}</span>
						<ul>
							@if($results->previousPageUrl())
								<li><a href="{{$results->previousPageUrl()}}"><i class="fa fa-caret-left" aria-hidden="true"></i></a></li>
							@endif
							@if($results->nextPageUrl())
								<li><a href="{{$results->nextPageUrl()}}"><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>

			<div class="upcoming_lesson_tab">
				@foreach($results as $result)
					<div class="dash_list_tab">
						<div class="row align-items-center">
							<div class="col-md-2">
								<div class="dash_profile_img">
									<img src="{{asset($result->tutor->profile_image)}}" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-7">
								<div class="dash_profile_content">
									<h2>{{$result->full_from_date}}</h2>
									<h2>{{$result->subject->flag_value}}</h2>
									<p>Tutor: {{$result->tutor->name}} </p>
									<p>Pupils: 
									@foreach($result->pupils as $pupil)
									{{$pupil->user->name}}
									@if(!$loop->last)
									, 
									@endif
									@endforeach
									</p>
									@if(isset($showTeacher))
										<p>Teacher: {{$result->teacher->name}} </p>
									@endif
									@if($result->status==1)
										<p class="dark_text">Cancel Reason: {{$result->cancel_reason}} </p>
									@endif
								</div>
							</div>

							<div class="col-md-3">
								<div class="lesson_btn">
									<a target="_blank" href="{{route('teacher.report',[$result])}}">Report</a>
									@if($result->status==2)
										<a href="{{route('teacher.markcomplete',[$result])}}">Mark Complete</a>
									@endif
									@if($result->status==0)
										<a onclick="cancelBooking({{$result->id}})" class="btn-danger" href="javascript:void(0)">Cancel</a>
										<a href="{{route('customer.attend',[$result])}}">Attend</a>
									@endif
								</div>
							</div>
						</div>
					</div>
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
.dark_text{
	color: red !important;
}
</style>
@endsection
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  (() => {
    /*in page css here*/
  })()
 
function cancelBooking(bookingid){
	swal({
	  title: "Are you sure?",
	  text: "If you Cancel the Booking you won't be able to re-instate it",
	  icon: "info",
	  button: {
		text: "Cancel Booking",
		closeModal: false,
	  },
	})
	.then((willDelete) => {
	  if (willDelete) {
		window.location.href='{{route('teacher.booking.cancel')}}/'+bookingid
	  } else {
		swal.close();
	  }
	});
}
</script>
@endsection