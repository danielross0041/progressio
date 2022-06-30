@extends('layouts.main')
@section('content')
<section class="progresso-tuition">
  <div class="container">
    <div class="row">
      <!--<div class="col-md-3 gray-bg">
        <div class="profile-sidebar">
          <ul>
            <li class='active'><a href=""><i class="fa fa-cog" aria-hidden="true"></i>My Account</a></li>
            <li><a href=""><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></li>
            <li><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i>Set Avalability</a></li>
            <li><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Profile</a></li>
            <li><a href=""><i class="fa fa-share" aria-hidden="true"></i>Contact Us</a></li>
            <li><a href=""><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
          </ul>
        </div>
      </div>-->
      <div class="col-md-12">
        <div class="tutor-profile">
          <div class="profile-det">
            <div class="row">
              <div class="col-md-3">
                <div class="prof-pic">
                  <h2>Tutor Profile</h2>
                  <img class="img-responsive img-thumbnail rounded-circle" src="{{asset($user->profile_image)}}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="tutor-det">
                  <h1><img src="{{asset('images/icon-01.png')}}" alt=""> Enhanced DBS Check</h1>
                  <h1><img src="{{asset('images/icon-02.png')}}" alt="">Progressio Tuition Safeguarding Trained </h1>
                  <h1><img src="{{asset('images/icon-03.png')}}" alt="">Progressio Tuition Interview: Excellent</h1>
                  <a href="#">Contact Me</a>
                </div>
              </div>
              <div class="col-md-5">
                <div class="tutor-review">
                  <ul class="star-icons">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
                  <span><p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, risus id auctor laoreet, massa velit pellentesque nunc, sed efficitur libero augue a nisl. Sed lacinia, nunc sed luctus congue.”</p>
                    <h3><em>Jeanie G. Hughes</em></h3></span>
                </div>
              </div>
            </div>
          </div>
          <div class="profile-data">
            <div class="row">
              <div class="col-md-9">
                <div class="profile-details">
              <ul>
              <li><span>Name:</span>{{$user->name}}.</li>
			  @if($user->tutordetail)
				<li><span>Hourly Rate:</span>£{{$user->tutordetail->price_per_hour}}/hr</li>
				<li><span>University Subject & University:</span>{{Helper::returnFlag($user->tutordetail->university)}}</li>
			  @endif
              <li class="star-icon"><span>Star Rating & Number of Reviews:</span>
                <ul class="star-icons">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
                  ( 0 reviews )
                </li>
              <li><span>Number of Lessons Completed:</span>0</li>
              <!-- <li><span>My Experience:</span><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, risus id auctor laoreet, massa velit pellentesque nunc, sed efficitur libero augue a nisl. Sed lacinia, nunc sed luctus congue, erat nisi viverra leo, nec imperdiet sapien arcu id sem. Vivamus pharetra maximus justo sit amet maximus. Etiam fermentum purus quis eros faucibus interdum. Sed molestie interdum dapibus.</p></li>
              <li><span>How I Tutor:</span><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, risus id auctor laoreet, massa velit pellentesque nunc, sed efficitur libero augue a nisl. Sed lacinia, nunc sed luctus congue, erat nisi viverra leo, nec imperdiet sapien arcu id sem.</p></li> -->
            </ul>
                </div>
              </div>
              <div class="col-md-12">
                <div class="profile-details">
              <ul>
              <li><span>My Experience:</span><p>{{$user->tutordetail->brief_description}}</p></li>
              <!--<li><span>How I Tutor:</span><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, risus id auctor laoreet, massa velit pellentesque nunc, sed efficitur libero augue a nisl. Sed lacinia, nunc sed luctus congue, erat nisi viverra leo, nec imperdiet sapien arcu id sem.</p></li>-->
            </ul>
                </div>
              </div>
              <div class="col-md-3">
              </div>
            </div>
          </div>
          <div class="qualification-table">
            <div class="row">
              <div class="col-md-6">
                <div class="qualifi-area">
                  <h1>My Qualifications:</h1>
                  <table>
                    <tr>
                      <th><h2>subject</h2></th>
                      <th><h2>level</h2></th>
                      <th><h2>grade</h2></th>
                    </tr>
                    <tr>
                      <td>Maths</td>
                      <td>A-Level</td>
                      <td>A*</td>
                    </tr>
                    <tr>
                      <td>Maths</td>
                      <td>A-Level</td>
                      <td>A*</td>
                    </tr>
                  </table>
                </div>
              </div>
               <div class="col-md-6">
                 <div class="subject-area">
                  <h1>Subjects That I Tutor:</h1>
                  <table>
                  <tr>
                    <th><h2>subject</h2></th>
                  </tr>
				  @foreach($user->tutorsubjects as $subject)
                  <tr>
                    <td>{{$subject->subject->flag_value}}</td>
                  </tr>
				  @endforeach
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="review-section">
            <h1>Reviews:</h1>
            <div class="row">
              <div class="col-md-12">
                <div class="review-slider">
                  <div class="review-slides">
                  <ul class="star-icons">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
                  <p><em>“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, risus id auctor laoreet, massa velit pellentesque nunc, sed efficitur libero augue a nisl. Sed lacinia, nunc sed luctus congue, erat nisi viverra leo, nec imperdiet sapien arcu id sem. Vivamus pharetra maximus justo sit amet maximus. Etiam fermentum purus quis eros faucibus interdum. Sed molestie interdum dapibus.” Jeanie G. Hughes</em></p>
                  </div>
                  <div class="review-slides">
                  <ul class="star-icons">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
                  <p><em>“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, risus id auctor laoreet, massa velit pellentesque nunc, sed efficitur libero augue a nisl. Sed lacinia, nunc sed luctus congue, erat nisi viverra leo, nec imperdiet sapien arcu id sem.” Jeanie G. Hughes</em></p>
                  </div>
                  <div class="review-slides">
                  <ul class="star-icons">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
                  <p><em>“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta, risus id auctor laoreet, massa velit pellentesque nunc.</em></p>
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
<style type="text/css">
    /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(() => {
$('.review-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
})()
</script>
@endsection