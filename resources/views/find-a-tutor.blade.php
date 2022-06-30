@extends('layouts.main') @section('content')
<section class="find-form">
    <div class="container">
        <div class="cant-find options-search-bar">
            <h4>Can't Find a Tutor? Let us find one for you!</h4>
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="" placeholder="What are you looking for? Give our tutor expert as much information as possible" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <input type="text" placeholder="Phone Number" name="" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <input type="text" placeholder="Email" name="" class="form-control" />
                    </div>
                    <div class="col-md-12">
                        <div class="select-opt">
                            <p>Which would you prefer us to contact you on when we have some suggestions?</p>
                            <select>
                                <option>Suggestions?</option>
                                <option>Option 01</option>
                                <option>Option 02</option>
                                <option>Option 02</option>
                            </select>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <input type="submit" class="btn" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="my-tutor">
    <div class="container">
        <div class="options-search-bar">
            <h4>Find a Tutor</h4>
            <form method="GET" action="{{route('find-a-tutor')}}" id="tutor_form">
                <div class="row">
                    <div class="col-md-12 multi-select">
                        <div class="select-opt">
                            <p>Subject</p>
                            <select class="js-example-basic-multiple select2-hidden-accessible mb-3" name="tutor_subject" required>
                                <option disabled selected>All Subjects</option>
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->flag_value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="select-opt">
                            <p>Price</p>
                            <select name="tutor_price" required>
                                <option disabled selected>All Price</option>
                                <option value="0">Under £25</option>
                                <option value="1">£25-35</option>
                                <option value="2">£35+</option>
                            </select>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="select-opt">
                            <p>Gender</p>
                            <input type="radio" id="male" name="tutor_gender" value="MALE" required />
                            &nbsp; <label for="male">Male</label> 
                            &nbsp; <input type="radio" id="female" name="tutor_gender" value="FEMALE" required/>
                            &nbsp; <label for="female">Female</label>
                        </div>
                    </div>
                    {{--
                    <div class="col-md-2">
                        <div class="select-opt">
                            <p>First Name</p>
                            <input type="text" name="" placeholder="Name" />
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <!-- <div class="filter-btn">
                            <a href="javascript:void(0)" class="mor-fil"><span>More Filters</span><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div> -->
                        <div class="select-opt">
                            <p>Age</p>
                            <select>
                                <option>Graduate</option>
                                <option>Undergraduate</option>
                            </select>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    --}}
                    <div class="col-md-4">
                        <div class="select-opt">
                            <button class="btn">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="more-filters">
                <div class="row">
                    <div class="col-md-2">
                        <div class="select-opt">
                            <p>Age</p>
                            <select>
                                <option>Graduate</option>
                                <option>Undergraduate</option>
                            </select>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="tutor-profiles-det">
    <div class="container">
        @if(!$users->isEmpty())

        @foreach($users as $user)
        <div class="row tutor-rw">
            <div class="col-md-2">
                <div class="tutor-img">
                    <img src="{{asset($user->profile_image)}}" alt="" />
                </div>
            </div>

            <div class="col-md-7">
                <div class="tutor-prof-blk">
                    <h1>{{$user->name}}</h1>
                    @if($subject->tutordetail)
                    <h2>{{Helper::returnFlag($subject->tutordetail->university)}}</h2>
                    <p>{{$subject->tutordetail->brief_description}}</p>
                    @endif
                    <ul>
                        <li>Subjects:</li>
                        <li>{{$user->tutor_subject->flag_value}}</li>
                        
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="tutor-fees">
                    <h1>£{{$user->per_hour_price}}<span>/hr</span></h1>
                    <ul class="pricing">
                        <li><i class="fa fa-trophy" aria-hidden="true"></i>0.00</li>
                        <li><i class="fa fa-eye" aria-hidden="true"></i>0<span>reviews</span></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>0<span>completed lessons</span></li>
                    </ul>
                    <a href="{{route('profile',$user)}}">View Profile</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <h4 class="no-tutor">No Tutor Found</h4>
        @endif
        {{$users->links()}}
    </div>
</section>
@endsection @section('css')
<style type="text/css">
    /*in page css here*/
</style>
@endsection @section('js')
<script type="text/javascript">
    (() => {
        /*in page css here*/
    })();
</script>
@endsection
