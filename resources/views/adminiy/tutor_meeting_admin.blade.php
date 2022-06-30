@extends('adminiy.layout.main')
@section('content')
<table class="table">
<thead>
<tr>
<td>#</td>
<td>Tutor Email</td>
<td>Date Time</td>
<td>Status</td>
<td>Action</td>
</tr>
</thead>
<tbody>
@foreach($tutor_meeting_admin as $tutor_meeting_admi)
	<tr>
	<td>{{$tutor_meeting_admi->id}}</td>
	<td>{{$tutor_meeting_admi->tutor->email}}</td>
	<td>{{$tutor_meeting_admi->date}} {{$tutor_meeting_admi->time}}</td>
	<td>
	@if($tutor_meeting_admi->meeting_success==0)
	Pending
	@elseif($tutor_meeting_admi->meeting_success==1)
	Approved
	@else
	Rejected
	@endif
	</td>
	<td>
		<a href="{{route('adminiy.tutor_meeting_admin.status',[$tutor_meeting_admi->id,1])}}" class="btn btn--outline btn-success btn-sm">Approve</a>
		<a href="{{route('adminiy.tutor_meeting_admin.status',[$tutor_meeting_admi->id,2])}}" class="btn btn--outline btn-danger btn-sm">Reject</a>
		@if($tutor_meeting_admi->meeting_success==1)
			<a href="{{route('adminiy.tutor_meeting_admin.sendlink',[$tutor_meeting_admi->id])}}" class="btn btn--outline btn-info btn-sm">Send Link</a>
		@endif
	</td>
	</tr>
@endforeach
</tbody>
</table>
{{$tutor_meeting_admin->links()}}
@endsection
@section('hcss')
<link rel="stylesheet" href="{{asset('admin/demo/css/demo.css')}}">
@endsection
@section('css')
<style>
.card-redirect .card-title {
	margin-bottom: 0px;
}
.actions:not(.actions--inverse) .actions__item {
    color: white;
}
.actions:not(.actions--inverse) .actions__item:hover {
    color: white;
}
.card-demo.card-redirect {
	max-width: unset;
	margin: unset;
}
</style>
@endsection