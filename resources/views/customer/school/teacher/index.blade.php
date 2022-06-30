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
                <h2>Add/Remove Teachers</h2>
              </div>
            </div>
          </div>

          <div class="upcoming_lesson_tab">
            <a class="btn btn-primary" href="{{route('school.teacher.add')}}">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
						<th>Sessions Booked</th>
                        <th>Joined?</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
						<td>{{$teacher->teachersessions()->count()}}</td>
                        <td>{{$teacher->is_active==0?'No':'Yes'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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