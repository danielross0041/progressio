<header class="con_sec_chg">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="logo-sec-main">
          <a href="{{route('home')}}">
            <!-- <img src="images/logo.png" class="img-responsive" alt="Progressio Tuition"> -->
            <?php print Helper::dynamicImages(asset('/'), 'images/logo.png', array("data-width" => "178", "data-height" => "55", "alt" => "Progressio Tuition logo", "class" => "img-responsive"), 'logo', true); ?>
          </a>
        </div>
      </div>

      <div class="col-md-10">
        <div class="main-menu-main">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="menu-sec-main">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center">
                  <li class="{{isset($homeMenu)?'active':''}}"><a href="{{route('home')}}">Home</a></li>
                  <li class="{{isset($aboutMenu)?'active':''}}"><a href="{{route('aboutUs')}}">About Us</a></li>
                  <li class="{{isset($findTutor)?'active':''}}"><a href="{{route('find-a-tutor')}}">Find a Tutor </a></li>
				  <!--<li class="{{isset($parentfirstMenu)?'active':''}}"><a href="{{route('parent.register')}}">Parent Register </a></li>-->
                  <li class="{{isset($tutorfirstMenu)?'active':''}}"><a href="{{route('tutor.step1')}}">Become a Tutor </a></li>
                  <li class="{{isset($pricesMenu)?'active':''}}"><a href="{{route('prices')}}">Prices</a></li>
                  <li class="{{isset($howtouseMenu)?'active':''}}"><a href="{{route('howtouse')}}">How to Use</a></li>
                  <li class="{{isset($freeseminarsMenu)?'active':''}}"><a href="{{route('freeseminars')}}">Free Seminars </a></li>
                  <li class="{{isset($faqMenu)?'active':''}}"><a href="{{route('faq')}}">FAQs </a></li>
                  <!-- <li class="{{isset($testimonialsMenu)?'actve':''}}"><a href="{{route('testimonials')}}">Testimonials</a></li> -->
                  @if(!Auth::check())
                  <li><a href="{{route('login')}}" class="login_btn">Login <i class="fa fa-user" aria-hidden="true"></i></a></li>
                  @else
                  <?php
                  if(Auth::user()->user_type==0){
                    $route = route('school.panel');
                  } elseif(Auth::user()->user_type==1){
                    $route = route('teacher.dashboard');
                  } elseif(Auth::user()->user_type==2){
                    $route = route('pupil.panel');
                  } elseif(Auth::user()->user_type==3){
                    $route = route('tutor.dashboard');
                  } elseif(Auth::user()->user_type==4){
                    $route = route('parent.panel');
                  }
                  ?>
                  <li><a href="{{$route}}" class="login_btn">Dashboard<i class="fa fa-tachometer" aria-hidden="true"></i></a></li>
                  <!-- <li><a href="{{route('customer.logout')}}" class="login_btn">Logout<i class="fa fa-tachometer" aria-hidden="true"></i></a></li> -->
                  @endif
                  <li><a href="tel:+44 (0) 207 846 8301" class="login_btn">+44 (0) 207 846 8301 <i class="fa fa-phone" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>