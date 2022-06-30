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
				<h3>Current Balance: <b>{{$current_balance}}</b></h3>
				<h3>Total Spent : <b>{{$spend_balance}}</b></h3>
              </div>
            </div>
          </div>

          <div class="upcoming_lesson_tab">
            <table class="table">
				<tr>
					<th>#</th>
					<th>Reason</th>
					<th>Amount</th>
				</tr>
				@foreach($transacitons as $transaciton)
				<tr>
					<td>{{$transaciton->id}}</td>
					<td>{{$transaciton->reason_for_transaction}}</td>
					<td>{{$transaciton->is_debit==1?'+':'-'}}{{$transaciton->coin}}</td>
				</tr>
				@endforeach
			</table>
			{{$transacitons->links()}}
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