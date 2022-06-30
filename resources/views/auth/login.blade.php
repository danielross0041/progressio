@extends('layouts.main')
@section('content')
<!-- Banner Section Begin -->

<section class="banner_sec_main login_banner con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="banner_img_sec">
                    <img src="{{asset('images/login-banner.jpg')}}" class="img-responive" alt="Banner Image">
                </div>
            </div>

            <div class="col-md-3">
                <div class="banner_form_sec">
                    <h2>Pupil login</h2>
                    <p>Progressio Tuition provide cost-effective tailored tuition to students of all ages to help boost confidence and improve grades </p>
                    <div class="login_form_sec">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Email" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Enter Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>
                                            <input type="radio" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember" name="radio-group">
                                            <label for="remember">Remember me</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="forget_link">
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-btn">
                                        <input type="submit" value="login">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="accout_text">
                                        <p>Don’t have an account? <a href="{{route('parent.register')}}">Click here.</a> </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section End -->
@endsection