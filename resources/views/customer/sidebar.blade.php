<div class="col-md-3">
  <div class="des_left_menu">
    <h2><i class="fa fa-cog" aria-hidden="true"></i> My Account</h2>
    <ul>
      @if(Auth::user()->user_type==0)
	  <li><a href="{{route('school.panel')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Lesson Schedule</a></li>
      <li><a href="{{route('school.lesson.purchase')}}"><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> Purchase Lessons</a></li>
      <li><a href="{{route('school.lesson.book')}}"><span><i class="fa fa-briefcase" aria-hidden="true"></i></span> Book a Tutor</a></li>
      <li><a href="{{route('school.teacher.list')}}"><span><i class="fa fa-user" aria-hidden="true"></i></span> Add/Remove Teacher </a></li>
      <li><a href="{{route('school.pupil.list')}}"><span><i class="fa fa-list-alt" aria-hidden="true"></i></span> Add/Remove Pupils </a></li>
	  <li><a href="{{route('school.anualreports')}}"><span><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> VIEW ANNUAL REPORTS & IMPACT ASSESSMENTS </a></li>
	  <li><a href="{{route('customer.contactus')}}"><span><i class="fa fa-mail-forward" aria-hidden="true"></i></span> Contact Us</a></li>
      @endif
      @if(Auth::user()->user_type==1)
		<li><a href="{{route('teacher.dashboard')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Lesson Schedule</a></li>
		<li><a href="{{route('teacher.panel')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Edit Profile</a></li>
		<!-- <li><a href="{{route('teacher.pupil.list')}}"><span><i class="fa fa-list-alt" aria-hidden="true"></i></span> Add/Remove Pupils </a></li> -->
		<!-- <li><a href="{{route('teacher.tutor.book')}}"><span><i class="fa fa-briefcase" aria-hidden="true"></i></span> Book a Tutor</a></li> -->
		<li><a href="{{route('teacher.lesson.reports')}}"><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> View Tutor lesson Reports</a></li>
		<!-- <li><a href="{{route('teacher.buycoin')}}"><span><i class="fa fa-dollar" aria-hidden="true"></i></span> Buy Coins (via Stripe)</a></li> -->
		<!-- <li><a href="{{route('customer.transactions')}}"><span><i class="fa fa-money" aria-hidden="true"></i></span> Coins / Transaction</a></li> -->
		<li><a href="{{route('teacher.booking_tutor_listing')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Booking Report</a></li>
		<li><a href="{{route('customer.contactus')}}"><span><i class="fa fa-mail-forward" aria-hidden="true"></i></span> Contact Us</a></li>
      @endif
      @if(Auth::user()->user_type==4)
		<li><a href="{{route('parent.panel')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Lesson Schedule</a></li>
		<li><a href="{{route('parent.pupil.list')}}"><span><i class="fa fa-list-alt" aria-hidden="true"></i></span> Add/Remove Pupils </a></li>
		<!-- {{route('teacher.tutor.book')}} -->
		<li><a href="{{route('parent.tutor.book')}}"><span><i class="fa fa-briefcase" aria-hidden="true"></i></span> Book a Tutor</a></li>
		<!-- {{route('teacher.lesson.reports')}} -->
		<li><a href="{{route('parent.lesson.reports')}}"><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> View Tutor lesson Reports</a></li>
		<li><a href="{{route('parent.booking_tutor_listing')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Booking Report</a></li>
		<li><a href="{{route('customer.contactus')}}"><span><i class="fa fa-mail-forward" aria-hidden="true"></i></span> Contact Us</a></li>
	@endif
	  @if(Auth::user()->user_type==2)
		  <li><a href="{{route('pupil.panel')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Lesson Schedule</a></li>
		  <li><a href="{{route('customer.contactus')}}"><span><i class="fa fa-mail-forward" aria-hidden="true"></i></span> Contact Us</a></li>
	  @endif
	  @if(Auth::user()->user_type==3)
		 <li><a href="{{route('tutor.dashboard')}}"><span><i class="fa fa-home" aria-hidden="true"></i></span> Lesson Schedule</a></li>
		<li><a href="{{route('tutor.schedule')}}"><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> Set availability</a></li>
		<li><a href="{{route('tutor.panel')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Edit Profile</a></li>
		<li><a href="{{route('tutor.booking_requests')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Booking Requests</a></li>
		<li><a href="{{route('tutor.booking_tutor_listing')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Booking Report</a></li>
		<!--<li><a href="{{route('customer.transactions')}}"><span><i class="fa fa-money" aria-hidden="true"></i></span> Coins / Transaction</a></li>-->
	@endif
	
      
      <!--<li><a href="{{route('customer.panel')}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Edit Profile</a></li>-->
      <li><a href="{{route('customer.logout')}}"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span> Logout</a></li>
    </ul>
  </div>
</div>
@include('customer.extends.changepasswordmodal')