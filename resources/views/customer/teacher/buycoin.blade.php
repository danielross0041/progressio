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
						<h2>Buy Coins</h2>
					</div>
				</div>
			</div>

			<div class="upcoming_lesson_tab">
				<form method="GET" action="{{route('teacher.buycoin')}}">
					<input name="coin" type="number" min="0" value="" placeholder="Enter Coins i.e 50,100,1000" class="form-control" />
					<input type="submit" value="Buy Now" class="btn btn-success mt-2" />
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
.dark_text{
	color: red !important;
}
</style>
@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection