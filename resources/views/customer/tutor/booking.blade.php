@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
    <div id="calendarapp" class="container">
        <div class="row">
            @include('customer.sidebar')

            <div class="col-md-9" id="answers_app">
                <h4>Booking Detail Report</h4>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Parent</td>
                            <td>Pupil</td>
                            <td>Amount</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $total = 0; ?>
                        @foreach($bookings as $key => $booking)
                        <tr>
                            <td>{{$key+1}}</td>
                            <?php $teacher = App\Model\User::where('id',$booking->teacher_id)->first(); ?>
                            <td>{{$teacher->name}}</td>
                            <?php $booking_pupil = App\Model\booking_pupils::where('booking_id',$booking->id)->first(); ?>
                            <?php $pupil = App\Model\User::where('id',$booking_pupil->pupil_id)->first(); ?>
                            <td>{{$pupil->name}}</td>
                            <td>${{$booking->total}}</td>
                            <?php if ($booking->status != 1 ) {
                            	$total += $booking->total;
                            } ?>
                            <td>{{ $booking->status === 0 ? "Paid" : ($booking->status ===1 ? "Cancelled" : ($booking->status ===2 ? "Class Taken" : ($booking->status ===3 ? "Complete" : ""))) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
			            <tr>
                            <td>#</td>
                            <td>Parent</td>
                            <td>Pupil</td>
                            <td>Amount</td>
                            <td>Status</td>
                        </tr>
			        </tfoot>
                </table>
                <div class="total-amount">
                	<h4>Total</h4>
                	<p><u>${{$total}}</u></p>
                </div>
                
            </div>
        </div>
    </div>
</section>



@endsection
@section('css')
<style type="text/css">
	.total-amount {float: right;}
</style>
@endsection
@section('js')

@endsection