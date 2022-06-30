@extends('layouts.main')
@section('content')

<!-- Banner Section Begin -->

<section class="banner_sec_main con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="banner_img_sec">
                    <img src="{{asset('images/become-a-tutor-bg.jpg')}}" class="img-responive" alt="Banner Image">
                </div>
            </div>

            <div class="col-md-3">
                <div class="banner_form_sec">
                    <h2>How To Use</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section End -->


<section class="easy-step-sec con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="center-web-heading">
                    <h4>3 Easy Steps</h4>
                    <h2>How To Use</h2>
                </div>
            </div>
        </div>

        <div class="step-sec-main">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="step-box-main">
                        <div class="step-sec-icon">
                            <img src="{{asset('images/step-icon-01.png')}}" alt="Step Icon" class="img-responsive">
                        </div>

                        <div class="step-content-sec">
                            <h2>Lorum Ispum Dolar</h2>

                            <p>Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. </p>

                            <a href="#"><img src="{{asset('images/arrow-icon-01.png')}}" alt="" class="img-responsive"></a>

                            <h4>01 - Step</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="step-box-main">
                        <div class="step-sec-icon">
                            <img src="{{asset('images/step-icon-02.png')}}" alt="Step Icon" class="img-responsive">
                        </div>

                        <div class="step-content-sec">
                            <h2>Lorum Ispum Dolar</h2>

                            <p>Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. </p>

                            <a href="#"><img src="{{asset('images/arrow-icon-01.png')}}" alt="" class="img-responsive"></a>

                            <h4>02 - Step</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="step-box-main">
                        <div class="step-sec-icon">
                            <img src="{{asset('images/step-icon-03.png')}}" alt="Step Icon" class="img-responsive">
                        </div>

                        <div class="step-content-sec">
                            <h2>Lorum Ispum Dolar</h2>

                            <p>Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. </p>

                            <a href="#"><img src="{{asset('images/arrow-icon-01.png')}}" alt="" class="img-responsive"></a>

                            <h4>03 - Step</h4>
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
        /*in page css here*/
    })()
</script>
@endsection