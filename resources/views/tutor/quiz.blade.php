@extends('layouts.main')
@section('content')
<section class="tutor_application_form">
<div class="container">
	<div class="row">
		<div class="tutor_application_head">
			<div class="row">
				<div class="col-md-6">
					<div class="tutor_head_sec">
						<h2>{{$title}}: (Check all that apply)</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="tutor_form_sec">
			<form method="POST" action="{{route('tutor.quiz',[$user->id,($index+1)])}}">
				@csrf
				<div class="row">
					<div class="col-md-12">
						<label>{{$tutor_quiz_questions->question}}</label>
					</div>
				</div>
				<div class="row">
					@foreach($tutor_quiz_questions->answers as $answer)
					<div class="col-md-6">
						<label>{{$answer->option_value}}</label>
						<input type="checkbox" class="form-control" value="{{$answer->id}}" name="options_selected[]" />
					</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-md-12 align-items-center">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="form-btn text-center">
									<input type="submit" value="Next">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
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

</script>
@endsection