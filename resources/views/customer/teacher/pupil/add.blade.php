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
                                <h2>Add Pupil</h2>
                            </div>
                        </div>
                    </div>

                    <div class="upcoming_lesson_tab">
                        <form method="POST" action="{{route('teacher.pupil.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                {{Helper::errorField('email',$errors)}}
                                <small id="emailHelp" class="form-text text-muted">We'll send confirmation email.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail11">Name</label>
                                <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputEmail11" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
                                {{Helper::errorField('name',$errors)}}
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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