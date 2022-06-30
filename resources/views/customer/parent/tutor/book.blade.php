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
					<select id="subject_select" class="form-control" name="subject"  required="">
						<option selected disabled>Select Subject</option>
						@foreach($subjects as $subject)
							<option value="{{$subject->id}}">{{$subject->flag_value}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6">
					<label>Number of Sessions</label>
					<input type="number" min="1" max="5" value="1" name="number_of_sessions" id="number_of_sessions" class="form-control" />
				</div>
				<div class="col-md-6">
					<label>Date</label>
					<input type="date" id="start_date" name="start_date" class="form-control" value="{{date('Y-m-d')}}" />
				</div>
			</div>
			<div class="row mt-3">
				
				<!-- <div class="col-md-6">
					<label>Time</label>
					<select v-model="start_time" name="start_time" class="form-control">
						@for($i = 8; $i < 19; $i++)
							@for($m=0;$m<60;$m+=5)
								<option value="{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}">{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}</option>
							@endfor
						@endfor
					</select>
				</div> -->
			</div>
			
			<!-- <div v-show="tutors.length>0" v-for="(tutor, tutork) in tutors" :key="tutork" class="row mt-3">
				<div class="col-md-3">
					<h4>@{{tutor.name}}</h4>
					<img :src="'{{asset('/')}}'+tutor.profile_image" class="img-responsive jacob-img" />
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
			</div> -->
			<div class="tutor_result">
				<h4 class="no-tutor">No Tutor Result</h4>
			</div>
			<div id="insertAfter"></div>

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
						<div class="col-md-12">
							<select id="book_from_time" class="form-control">
								<option value="" id="from_time" disabled>Select Start Time</option>
								
							</select>
						</div>
						<div style="display:none" class="col-md-6">
							<select disabled readonly id="book_to_time" class="form-control">
								<option value="">Select End Time</option>
								
							</select>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-md-12" id="bookingMsg">
						
						</div>
					</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Booking</button>
					<button type="button" class="btn btn-primary" id="calculatePrice">Calculate Price</button>
					<button type="button" class="btn btn-primary" id="provideBooking" style="display: none;">Provide Booking Details</button>
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
let tutorGlobal = 0;
let hourGlobal = 0;
let amountGlobal = 0;
let book_time_fromGlobal = 0;
let sessionGlobal = 0;
let pupilGlobal = 0;
let date_of_bookingGlobal = 0;
let subjectGlobal = 0;
$(document).ready(function() {
	$('.pupil_select').select2({
		multiple: true,
		width: 'resolve',
		maximumSelectionLength: 3
	});
})

$('body').on('click','#calculatePrice',function(){
	var number_of_sessions = $("#number_of_sessions").val()
	sessionGlobal= number_of_sessions;
	var start_time = $("#book_from_time").val()
	book_time_fromGlobal = start_time;
	var tutor_id = tutorGlobal
	var pupil = $(".pupil_select").val()
	pupilGlobal = pupil;
	console.log(pupil)
	if (pupil.length === 0) {
		generateNotification('0','Please Select Pupils');
	} else{
		$.ajax({
	        type: 'post',
	        dataType : 'json',
	        url: "{{route('parent.tutor.calculatePrice')}}",        
	        data: {pupil:pupil, tutor_id:tutor_id, number_of_sessions: number_of_sessions ,start_time: start_time , _token: '{{csrf_token()}}'},
	        success: function (response) {
	        	hourGlobal = response.data.hours
	        	amountGlobal = response.data.price
	        	console.log(response.data.price)
	        	console.log(response.data.hours)
	        	var body = '<p><b>Booking Duration: </b>'+response.data.hours+' Hour</p><p><b>Booking Amount: </b>'+response.data.price+'£</p>'
	        	$("#provideBooking").css('display','')
	        	$("#calculatePrice").css('display','none')
	        	$("#book_from_time").css('display','none')
	        	$("#bookingMsg").html(body)
	        }
	    });
	}
})
$('#subject_select').on("change", function (e) {
	var subject = $(this).val()
	subjectGlobal = subject;
	var date = $("#start_date").val()
	date_of_bookingGlobal = date;
	$.ajax({
        type: 'post',
        dataType : 'json',
        url: "{{route('parent.tutor.getResults')}}",        
        data: {subject: subject ,date: date , _token: '{{csrf_token()}}'},
        success: function (response) {
        	$(".tutor_result").remove();
        	$(response).insertAfter("#insertAfter");
        }
    });
	// console.log(pupil)
})
$('body').on('click','.schedule_btn',function(){
	var tutor_id = $(this).data("tutor_id");
	var start_date = $("#start_date").val()
	tutorGlobal = tutor_id
	var element = $(this);
	console.log(tutor_id);
	console.log(start_date);
	$.ajax({
        type: 'post',
        dataType : 'json',
        url: "{{route('parent.tutor.getSchedule')}}",        
        data: {tutor_id:tutor_id, start_date:start_date, _token: '{{csrf_token()}}'},
        success: function (response) {
        	var el = $(element).closest(".tutor_insert").find(".insertHere");
        	console.log(el);
        	// console.log(response);
        	$(".booking").remove();
        	$(response).insertAfter(el);
        }
    });
})

function myFunction(tutor_id, time_selected, start_date, availablility){
	$("#provideBooking").css('display','none')
	$("#calculatePrice").css('display','')
	$("#book_from_time").css('display','')
	$("#bookingMsg").html("")
	if (availablility == 'available') {
		$.ajax({
	        type: 'post',
	        dataType : 'json',
	        url: "{{route('parent.tutor.getStartTime')}}",        
	        data: {tutor_id:tutor_id, start_date:start_date, time_selected:time_selected, availablility:availablility, _token: '{{csrf_token()}}'},
	        success: function (response) {
	        	$(".remove_option").remove();
	        	$(response.body).insertAfter("#from_time");
	        	$('#bookingModal').modal('toggle');
	        }
	    });
	}
}
$('body').on('click','#provideBooking',function(){
	$.ajax({
        type: 'post',
        dataType : 'json',
        url: "{{route('parent.tutor.updateBookingSession')}}",
        data: {tutor_id:tutorGlobal, start_date:date_of_bookingGlobal, time_selected:book_time_fromGlobal, hours:hourGlobal, amount:amountGlobal, session:sessionGlobal, pupil:pupilGlobal, subject:subjectGlobal ,_token: '{{csrf_token()}}'},
        success: function (response) {
        	window.location.href="{{route('parent.tutor.schedule.provideDetails')}}"
        }
    });
})


// tryBooking(tutor, schedul, schedulek){
// 		  console.log(tutor, schedul, schedulek);
// 		  if(schedul===true){
// 			  $('#bookingModal').modal('toggle');
// 			  this.currentTutorSelect = tutor
// 			  this.currentTimeSelect = schedulek;
// 		  }else{
// 			  generateNotification('0','Selected Time is unavilable');
// 		  }
// 	  },
// var tutorbookingapp = new Vue({
//   el: '#tutorbookingapp',
//   data: {
//     subject:'',
// 	pupilsvue: [],
// 	number_of_sessions:1,
// 	start_date: '{{date('Y-m-d')}}',
// 	start_time: '08:00',
// 	tutors: [],
// 	booked: [],
// 	currentTutorSelect: {},
// 	currentTimeSelect: '08:00',
// 	timeArr: [
// 	<?php for($i = 8; $i < 19; $i++) {
// 		for($m=0;$m<60;$m+=5) { ?>
// 			'{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}',
// 		<?php }
// 	} ?>
// 	],
// 	book_from_time:'',
// 	book_to_time: '',
// 	bookingMsg: '',
//   },
//   methods:{
// 	  calculateBookingPrice(){
// 		  if(this.book_from_time!=''&&this.book_to_time!=''){
// 			  ajaxify({
// 				  book_from_time: this.book_from_time,
// 				  book_to_time: this.book_to_time,
// 				  tutor_id: this.currentTutorSelect.id,
// 				  pupils: this.pupilsvue
// 			  },'POST','{{route('teacher.tutor.calculatePrice')}}').then(function(e){
// 				  //console.log(e.status, e.status=='1');
// 				  if(e.status=='1'){
// 					  tutorbookingapp.bookingMsg = '<p><b>Booking Duration: </b>'+e.data.hours+' Hour</p>'
// 					  tutorbookingapp.bookingMsg+='<p><b>Booking Amount: </b>'+e.data.price+'£</p>';
// 				  }else{
// 					  $('#bookingModal').modal('toggle');
// 					  generateNotification('0','Unable to book this tutor');
// 				  }
// 			  })
// 		  }else{
// 			  generateNotification('0','Please select from time and to time to Start Booking Process');
// 		  }
// 	  },
// 	  async getTutors(){
// 		  if(this.subject){
// 			  this.tutors = await ajaxify({
// 				  number_of_sessions: this.number_of_sessions,
// 				  subject: this.subject,
// 			  },'POST','{{route('parent.tutor.getResults')}}')
// 		  }
// 	  },
// 	  async seeSchedule(tutork){
// 		  if(!this.tutors[tutork].showSchedule){
// 			  this.tutors[tutork].showSchedule = 1;
// 			  this.tutors[tutork].schedule = await ajaxify({
// 				  tutor_id: this.tutors[tutork].id,
// 				  start_date: this.start_date,
// 			  },'POST','{{route('teacher.tutor.getSchedule')}}');
// 		  }else{
// 			  this.tutors[tutork].showSchedule = 0;
// 			  this.tutors[tutork].schedule = [];
// 		  }
// 		  this.$forceUpdate()
// 	  },
// 	  tryBooking(tutor, schedul, schedulek){
// 		  //console.log(tutor, schedul, schedulek);
// 		  if(schedul===true){
// 			  $('#bookingModal').modal('toggle');
// 			  this.currentTutorSelect = tutor
// 			  this.currentTimeSelect = schedulek;
// 		  }else{
// 			  generateNotification('0','Selected Time is unavilable');
// 		  }
// 	  },
// 	  async confirmBooking(){
// 		  if(this.pupilsvue.length==0){
// 			  generateNotification('0','Please Select Pupils');
// 			  return;
// 		  }
// 		  if(this.subject==''){
// 			  generateNotification('0','Please Select Subject');
// 			  return;
// 		  }
// 		  await ajaxify({
// 			  tutor_id: this.currentTutorSelect.id,
// 			  book_from_time: this.book_from_time,
// 			  book_to_time: this.book_to_time,
// 			  pupils: this.pupilsvue,
// 			  booking_date: this.start_date,
// 			  subject_id: this.subject
// 		  },'POST','{{route('teacher.tutor.updateBookingSession')}}')
// 		  window.location.href='{{route('teacher.tutor.schedule.provideDetails')}}'
// 	  }
//   },
//   watch:{
// 	  number_of_sessions(){
// 		  this.getTutors();
// 	  },
// 	  start_date(){
// 		  this.getTutors();
// 	  },
// 	  start_time(){
// 		  this.getTutors();
// 	  },
// 	  subject(){
// 		  this.getTutors();
// 	  },
// 	  book_from_time(){
// 		  let found = false
// 		  let found_aft_4 = 0
// 		  for(let q = 0; q < this.availableSlot.length;q++){
// 			  if(this.availableSlot[q]==this.book_from_time){
// 				  found = true
// 			  }
// 			  if(found===true){
// 				  found_aft_4++
// 				  if(found_aft_4==13){
// 					  this.book_to_time=this.availableSlot[q]
// 				  }
// 			  }
// 		  }
// 		  this.calculateBookingPrice()
// 	  },
// 	  pupilsvue(){
// 		  this.calculateBookingPrice()
// 	  }
//   },
//   computed: {
// 	  availableSlot(){
// 		  var arr = [];
// 		  var foundMine = false;
// 		  for(let i in this.currentTutorSelect.schedule){
// 			  if(i==this.currentTimeSelect&&this.currentTutorSelect.schedule[i]===true){
// 				  foundMine = true;
// 			  }else if(this.currentTutorSelect.schedule[i]===false){
// 				  foundMine = false;
// 			  }
// 			  if(this.currentTutorSelect.schedule[i]===true&&foundMine===true){
// 				  arr.push(i);
// 			  }
// 		  }
// 		  return arr;
// 	  }
//   }
// })
</script>
@endsection