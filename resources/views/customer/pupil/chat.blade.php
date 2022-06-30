@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
  <div class="container">
    <div class="row">
      @include('customer.sidebar')
      <div class="col-md-9 pt-5 pb-5">
		<div class="dashborad_main_sec hide-border">
			<div class="row">
				<div class="col-md-12">
					<ul class="chat">
						@foreach($chat as $cha)
							<li class="{{$cha->user_id==Auth::user()->id?'right':'left'}}">
								<p>{{$cha->message}}</p>
								<span>{{$cha->created_at->diffForHumans()}}</span>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-12">
					<form method="POST" action="{{route('customer.sendchat',[$booking])}}">
						@csrf
						<input type="text" name="message" class="form-control" />
					</form>
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
.chat .right {
    float: right;
    display: block;
    width: 100%;
    text-align: right;
}
.hide-border .row::after {
    display: none;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
(() => {
/*in page css here*/
})()
</script>
@endsection