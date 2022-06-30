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
                    <div class="row tutor_form_sec">
                        <div class="col-md-12">
                            
                            <div class="upcoming_lesson_tab">
                                <form method="POST" action="{{route('parent.pupil.store')}}">
                                    @csrf
                                    <div class="row">
                                        
                                        <div class="col-md-6 form-group">
                                            <label>Email address</label>
                                            <input type="email" value="{{old('email')}}" class="form-control"  name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                            {{Helper::errorField('email',$errors)}}
                                            <small id="emailHelp" class="form-text text-muted">We'll send confirmation email.</small>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Name</label>
                                            <input type="text" value="{{old('name')}}" class="form-control"  name="name" aria-describedby="emailHelp" placeholder="Enter Name">
                                            {{Helper::errorField('name',$errors)}}
                                        </div>
                                        <div class="col-md-12 ">
                                            <label>School</label>
                                            <select name="school_id">
                                                <option selected disabled>School</option>
                                                @foreach($school as $sch)
                                                <?php $detail = App\Model\User::where('id',$sch->school_id)->first(); ?>
                                                <option value="{{$detail->id}}">{{$detail->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Enter School Name(if not listed)</label>
                                            <input type="text" value="{{old('school_name')}}" class="form-control"  name="school_name" placeholder=" School Name">
                                            {{Helper::errorField('school_name',$errors)}}
                                            
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Enter School Email(if not listed)</label>
                                            <input type="email" value="{{old('school_email')}}" class="form-control"  name="school_email" placeholder=" School Email">
                                            {{Helper::errorField('school_email',$errors)}}
                                            
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Enter School Postal Code</label>
                                            <input type="text" value="{{old('school_postal_code')}}" class="form-control"  name="school_postal_code" placeholder=" School Postal Code">
                                            {{Helper::errorField('school_postal_code',$errors)}}
                                            
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Enter School Area</label>
                                            <input type="text" value="{{old('school_area')}}" class="form-control"  name="school_area" aria-describedby="emailHelp" placeholder=" School Area">
                                            {{Helper::errorField('school_area',$errors)}}
                                        </div>
                                        
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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
        /*in page css here*/
    })()
</script>
@endsection