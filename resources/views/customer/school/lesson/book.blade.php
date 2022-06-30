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
                <h2>Book Tutor</h2>
              </div>
            </div>
          </div>

          <div id="tutorbookingapp" class="upcoming_lesson_tab">
            <div class="row">
				<div class="col-md-12">
					<label>Select Pupil</label>
					<select style="width: 100%" name="pupils[]" multiple="multiple" class="pupil_select">
						@foreach($pupils as $pupil)
							<option value="{{$pupil->id}}">{{$pupil->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-6">
					<label>Select Subject</label>
					<select v-model="subject" class="form-control" name="subject"  required="">
						@foreach($subjects as $subject)
							<option value="{{$subject->id}}">{{$subject->flag_value}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6">
					<label>Number of Sessions</label>
					<input v-model="number_of_sessions" type="number" min="0" max="5" name="number_of_sessions" class="form-control" />
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-6">
					<label>Date</label>
					<input v-model="start_date" type="date" name="start_date" class="form-control" />
				</div>
				<div class="col-md-6">
					<label>Time</label>
					<select v-model="start_time" name="start_time" class="form-control">
						@for($i = 8; $i < 19; $i++)
							@for($m=0;$m<60;$m+=15)
								<option value="{{$i<10?'0'.$i:$i}}:{{$m==0?'00':$m}}">{{$i<10?'0'.$i:$i}}:{{$m==0?'00':$m}}</option>
							@endfor
						@endfor
					</select>
				</div>
			</div>
			
			<div v-for="(tutor, tutork) in tutors" :key="tutork" class="row mt-3">
				<div class="col-md-3">
					<h4>@{{tutor.name}}</h4>
					<img :src="'{{asset('/')}}/'+tutor.profile_image" class="img-responsive" />
				</div>
				<div class="col-md-9">
					<p><b>Per Hour</b> @{{tutor.tutordetail.per_hour_price}}£</p>
					<p><b>Beief Description</b> @{{tutor.tutordetail.brief_description}}</p>
					<p><b>University</b> @{{tutor.tutordetail.uni.flag_value}}</p>
					<p><b>Subjects</b> <ul class="list-group-item-light">
						<li v-for="(subject, subjectk) in tutor.tutorsubjects">@{{subject.subject.flag_value}}</li>
					</ul></p>
					<button class="btn" @click="seeSchedule(tutork)">See Schedule</button>
				</div>
				<div class="col-md-12 mt-2" v-if="tutor.showSchedule==1">
					<ul class="bookinginrow">
						<li @click="tryBooking(tutor,schedul, schedulk)" v-for="(schedul, schedulk) in tutor.schedule" :key="schedulk" :class="schedul===false?'unbooked':'available'">@{{schedulk}}</li>
					</ul>
				</div>
			</div>
			<!--modal-->
			<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Booking</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<select v-model="book_from_time" class="form-control">
								<option value="">Select Start Time</option>
								<option :value="availableSlo" v-for="availableSlo in availableSlot">@{{availableSlo}}</option>
							</select>
						</div>
						<div class="col-md-6">
							<select v-model="book_to_time" class="form-control">
								<option value="">Select End Time</option>
								<option :value="availableSlo" v-for="availableSlo in availableSlot">@{{availableSlo}}</option>
							</select>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-md-12" v-html="bookingMsg">
						
						</div>
					</div>
				  </div>
				  <div class="modal-footer">
					<button @click="bookingMsg=''" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Booking</button>
					<button v-if="bookingMsg==''" @click="calculateBookingPrice" type="button" class="btn btn-primary">Calculate Price</button>
					<button v-else @click="confirmBooking" type="button" class="btn btn-primary">Provide Booking Details</button>
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
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
.messages_das_sec{
	background: white;
}
.dashborad_main_sec .row:after{
	content: unset;
}
.bookinginrow li {
    display: inline;
    margin-left: 5px;
    padding: 3px;
    border-radius: 6px;
    font-size: 12px;
}
.bookinginrow {overflow-x: scroll;}
.bookinginrow li.unbooked{
	background: red;
	color: white;
}
.bookinginrow li.available{
	background: green;
	color: white;
}
</style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.pupil_select').select2({
		multiple: true,
		width: 'resolve'
	});
	$('.pupil_select').on("change", function (e) {
		tutorbookingapp.pupilsvue = $('.pupil_select').val();
	});
})
var tutorbookingapp = new Vue({
  el: '#tutorbookingapp',
  data: {
    subject:'',
	pupilsvue: [],
	number_of_sessions:1,
	start_date: '{{date('Y-m-d')}}',
	start_time: '08:00',
	tutors: [],
	booked: [],
	currentTutorSelect: {},
	currentTimeSelect: '08:00',
	timeArr: [
	<?php for($i = 8; $i < 19; $i++) {
		for($m=0;$m<60;$m+=15) { ?>
			'{{$i<10?'0'.$i:$i}}:{{$m==0?'00':$m}}',
		<?php }
	} ?>
	],
	book_from_time:'',
	book_to_time: '',
	bookingMsg: '',
  },
  methods:{
	  calculateBookingPrice(){
		  if(this.book_from_time!=''&&this.book_to_time!=''){
			  ajaxify({
				  book_from_time: this.book_from_time,
				  book_to_time: this.book_to_time,
				  tutor_id: this.currentTutorSelect.id
			  },'POST','{{route('school.tutor.calculatePrice')}}').then(function(e){
				  console.log(e.status, e.status=='1');
				  if(e.status=='1'){
					  tutorbookingapp.bookingMsg = '<p><b>Booking Duration: </b>'+e.data.hours+' Hour</p>'
					  tutorbookingapp.bookingMsg+='<p><b>Booking Amount: </b>'+e.data.price+'£</p>';
				  }else{
					  $('#bookingModal').modal('toggle');
					  generateNotification('0','Unable to book this tutor');
				  }
			  })
		  }else{
			  generateNotification('0','Please select from time and to time to Start Booking Process');
		  }
	  },
	  async getTutors(){
		  if(this.subject){
			  this.tutors = await ajaxify({
				  number_of_sessions: this.number_of_sessions,
				  start_date: this.start_date,
				  subject: this.subject,
				  start_time: this.start_time,
			  },'POST','{{route('school.tutor.getResults')}}')
		  }
	  },
	  async seeSchedule(tutork){
		  if(!this.tutors[tutork].showSchedule){
			  this.tutors[tutork].showSchedule = 1;
			  this.tutors[tutork].schedule = await ajaxify({
				  tutor_id: this.tutors[tutork].id,
				  start_date: this.start_date,
			  },'POST','{{route('school.tutor.getSchedule')}}');
		  }else{
			  this.tutors[tutork].showSchedule = 0;
			  this.tutors[tutork].schedule = [];
		  }
		  this.$forceUpdate()
	  },
	  tryBooking(tutor, schedul, schedulek){
		  //console.log(tutor, schedul, schedulek);
		  if(schedul===true){
			  $('#bookingModal').modal('toggle');
			  this.currentTutorSelect = tutor
			  this.currentTimeSelect = schedulek;
		  }else{
			  generateNotification('0','Selected Time is unavilable');
		  }
	  },
	  async confirmBooking(){
		  if(this.pupilsvue.length==0){
			  generateNotification('0','Please Select Pupils');
			  return;
		  }
		  if(this.subject==''){
			  generateNotification('0','Please Select Subject');
			  return;
		  }
		  await ajaxify({
			  tutor_id: this.currentTutorSelect.id,
			  book_from_time: this.book_from_time,
			  book_to_time: this.book_to_time,
			  pupils: this.pupilsvue,
			  booking_date: this.start_date,
			  subject_id: this.subject
		  },'POST','{{route('school.tutor.updateBookingSession')}}')
		  window.location.href='{{route('school.tutor.schedule.provideDetails')}}'
	  }
  },
  watch:{
	  number_of_sessions(){
		  this.getTutors();
	  },
	  start_date(){
		  this.getTutors();
	  },
	  start_time(){
		  this.getTutors();
	  },
	  subject(){
		  this.getTutors();
	  },
  },
  computed: {
	  availableSlot(){
		  var arr = [];
		  var foundMine = false;
		  for(let i in this.currentTutorSelect.schedule){
			  if(i==this.currentTimeSelect&&this.currentTutorSelect.schedule[i]===true){
				  foundMine = true;
			  }else if(this.currentTutorSelect.schedule[i]===false){
				  foundMine = false;
			  }
			  if(this.currentTutorSelect.schedule[i]===true&&foundMine===true){
				  arr.push(i);
			  }
		  }
		  return arr;
	  }
  }
})
</script>
@endsection