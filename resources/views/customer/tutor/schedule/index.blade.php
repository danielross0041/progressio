@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
  <div id="calendarapp" class="container">
    <div class="row">
      @include('customer.sidebar')
      <div class="col-md-9 pt-5 pb-5">
        <div class="dashborad_main_sec">
          <div class="row">
            <div class="col-md-12">
              <div class="dash_head_sec">
                <h2>Schedule Time</h2>
				<p>-Providing regular availability so that teachers can provide continuity for their pupils. If you can mark for the whole term it will increase your chance of getting pupils!</p>
				<h4>
					<button class="btn" v-if="monday>0" @click="getPrevWeek" type="button">Previous Week</button>
					@{{currentWeekName}}
					<button class="btn" @click="getNextWeek" type="button">Next Week</button></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label>Select Week Day</label>
			  <select v-model="weekday" class="form-control">
				<option value="1">Monday</option>
				<option value="2">Tuesday</option>
				<option value="3">Wednesday</option>
				<option value="4">Thursday</option>
				<option value="5">Friday</option>
			  </select>
            </div>
			<div class="col-md-6  mt-2">
              <label>Select Start Time</label>
			  <select v-model="starttime" class="form-control">
				@for($i = 8; $i < 19; $i++)
					@for($m=0;$m<60;$m+=5)
						<option value="{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}">{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}</option>
					@endfor
				@endfor
			  </select>
            </div>
			<div class="col-md-6  mt-2">
              <label>Select End Time</label>
			  <select v-model="endtime" class="form-control">
				@for($i = 8; $i < 19; $i++)
					@for($m=0;$m<60;$m+=5)
						<option value="{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}">{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}</option>
					@endfor
				@endfor
			  </select>
            </div>
			<div class="col-md-12 mt-2">
				<button @click="updateSchedule" class="btn">Add Schedule</button>
				<button @click="removeSchedule" class="btn">Remove Schedule</button>
				<button @click="copySchedule" class="btn">Copy Current Week to Next Week</button>
			</div>
          </div>
		  <div class="row mt-2 calhead">
			<div class="col-md-2"></div>
			<div class="col-md-2" v-for="(cal, calk) in calendar">@{{calk}}</div>
		  </div>
		  <div class="row">
			<div class="col-md-2 calhead">
				<ul>
				@for($i = 8; $i < 19; $i++)
					@for($m=0;$m<60;$m+=5)
						<li>{{$i<10?'0'.$i:$i}}:{{$m==0?'00':($m<10?('0'.$m):$m)}}</li>
					@endfor
				@endfor
				</ul>
			</div>
			<div class="col-md-2" v-for="(cal, calk) in calendar">
				<ul>
					<li v-for="(ca, cak) in cal" :class="ca===false?'booked':''">@{{ca===false?'N/A':'Booked'}}</li>
				</ul>
			</div>
		  </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('css')
<style type="text/css">
.calhead{
	background: lightcyan;
}
</style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script type="text/javascript">
var calendarapp = new Vue({
  el: '#calendarapp',
  data: {
    monday: 0,
	friday: 4,
	week: 1,
	fetching: false,
	weekday: 1,
	starttime: '08:00',
	endtime: '18:45',
	calendar: {},
  },
  methods:{
	  async getCurrentWeek(){
		  this.fetching = true
		  var res = await ajaxify({
			  start: this.monday,
			  end: this.friday,
		  },'POST','{{route('tutor.schedule.fetchweeks')}}')
		  this.calendar = res.data
		  this.fetching = false
	  },
	  getNextWeek(){
		  this.week++;
		  this.monday = (this.monday+7);
		  this.friday = (this.friday+7);
		  this.getCurrentWeek();
	  },
	  getPrevWeek(){
		  if(this.monday>0){
			  this.week--;
			  this.monday = (this.monday-7);
			  this.friday = (this.friday-7);
			  this.getCurrentWeek();
		  }else{
			  generateNotification('0','Can not get previos week');
		  }
	  },
	  async updateSchedule(){
		  var res = await ajaxify({
			  weekday: this.weekday,
			  starttime: this.starttime,
			  endtime: this.endtime,
			  start: this.monday,
			  end: this.friday,
		  },'POST','{{route('tutor.schedule.update')}}')
		  this.getCurrentWeek();
	  },
	  async removeSchedule(){
		  var res = await ajaxify({
			  weekday: this.weekday,
			  starttime: this.starttime,
			  endtime: this.endtime,
			  start: this.monday,
			  end: this.friday,
			  remove: 'true',
		  },'POST','{{route('tutor.schedule.update')}}')
		  this.getCurrentWeek();
	  },
	  async copySchedule(){
		  var res = await ajaxify({
			  weekday: this.weekday,
			  starttime: this.starttime,
			  endtime: this.endtime,
			  start: this.monday,
			  end: this.friday,
			  remove: 'true',
		  },'POST','{{route('tutor.schedule.copy')}}')
		  this.getNextWeek();
	  }
  },
  mounted(){
	  this.getCurrentWeek()
  },
  computed:{
	  currentWeekName(){
		  return this.week==1?'Current Week': this.week+' Week ahead from Current Week';
	  }
  }
})
</script>
@endsection