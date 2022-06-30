@extends('layouts.main')
@section('content')

<!-- Banner Section Begin -->

<section class="banner_sec_main con_sec_chg">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="banner_img_sec">
                    <img src="{{asset('images/login-banner.jpg')}}" class="img-responive" alt="Banner Image">
                </div>
            </div>

            <div class="col-md-3">
                <div class="banner_form_sec">
                    <h2>Book Club</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section End -->


<!-- Book Club Section Begin -->

<section class="book_club_sec con_sec_chg">
    <div class="container">
        <div class="row">
            @foreach($data as $dat)
                <div class="col-md-3">
                    <div class="book_sec_box">
                        <div class="book_img">
                            <img src="{{asset($dat->image->url)}}" class="img-responive" alt="">
                        </div>
                        <div class="book_content_box">
                            <h2>{{$dat->seminar_name}}</h2>
                            <p>{{$dat->short_description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Book Club Section End -->
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