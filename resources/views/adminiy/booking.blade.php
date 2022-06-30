@extends('adminiy.layout.main')
@section('content')
<div class="" id="answers_app">
	<h4>Booking Detail Report</h4>
	<?php $total = 0; ?>
	<table id="example" class="table table-striped" style="width:100%">
		<thead>
			<tr>
			<td>#</td>
			<td>Tutor</td>
			<td>Teacher</td>
			<td>Pupil</td>
			<td>Amount</td>
			<td>Status</td>
			</tr>
		</thead>
		<tbody>
			@foreach($bookings as $key => $booking)
			<tr>
				<td>{{$key+1}}</td>
				<?php $tutor = App\Model\User::where('id',$booking->tutor_id)->first(); ?>
				<td>{{$tutor->name}}</td>
				<?php $teacher = App\Model\User::where('id',$booking->teacher_id)->first(); ?>
				<td>{{$teacher->name}}</td>
				<?php $booking_pupil = App\Model\booking_pupils::where('booking_id',$booking->id)->first(); ?>
                <?php $pupil = App\Model\User::where('id',$booking_pupil->pupil_id)->first(); ?>
                <td>{{$pupil->name}}</td>
				<td>${{$booking->total}}</td>
				<?php if ($booking->status != 1 ) {
                	$total += $booking->total;
                } ?>
				<td>{{  $booking->status === 0 ? "Paid" : ($booking->status ===1 ? "Cancelled" : ($booking->status ===2 ? "Class Taken" : ($booking->status ===3 ? "Complete" : ""))) }}</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="total-amount">
		<h4>Total</h4>
		<p><u>${{$total}}</u></p>
	</div>
	
</div>
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
<style type="text/css">
	.total-amount {float: right;}
</style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

@endsection