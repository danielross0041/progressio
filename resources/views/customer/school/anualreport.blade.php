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
						<h2>Annual Reports</h2>
					</div>
				</div>
			</div>

			<div class="upcoming_lesson_tab">
				@foreach($results as $result)
					<div class="dash_list_tab">
						<div class="row align-items-center">
							<div class="col-md-9">
								<div class="dash_profile_content">
									<h2>{{$result->title}}</h2>
									<?php print $result->description; ?>
									<p><b>Added on:</b> {{$result->created_at}}</p>
								</div>
							</div>

							<div class="col-md-3">
								<div class="lesson_btn">
									<a download href="{{asset($result->downloadfile->url)}}">Download file</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
    </div>
  </div>
</section>
@endsection
@section('css')
<style type="text/css">

</style>
@endsection
@section('js')
<script type="text/javascript">
  (() => {
    /*in page css here*/
  })()
</script>
@endsection