@extends('adminiy.layout.main')
@section('content')
<div class="" id="answers_app">
	<h4>@{{question}}</h4>
	@{{rows}}
	<table class="table">
		<thead>
			<tr>
			<td>#</td>
			<td>Option Value</td>
			<td>Is Correct?</td>
			<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(row, rowk) in rows" :key="rowk">
				<td>@{{(rowk+1)}}</td>
				<td><input placeholder="Option Value" type="text" class="form-control" v-model="row.option" /></td>
				<td>
					<select class="form-control" v-model="row.is_correct">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</td>
				<td><button @click="removeRow(rowk)" class="btn btn-sm btn-danger">Remove</button></td>
			</tr>
		</tbody>
	</table>
	<button @click="addRow" class="btn btn-sm btn-info">Add Option</button>
	<button @click="saveData" class="btn btn-sm btn-success">Save</button>
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
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
var app = new Vue({
  el: '#answers_app',
  data: {
    question: '{{$tutor_quiz_questions->question}}',
	rows: []
  },
  methods: {
	  addRow(){
		this.rows.push({
			option: '',
			is_correct: 0,
		})
	  },
	  removeRow(k){
		  this.rows.splice(k,1);
	  },
	  saveData(){
		  ajaxify({
			  values: this.rows
		  },'POST','{{route('adminiy.saveanswers',[$tutor_quiz_questions->id])}}').then(function(){
			  notify('1','Answers saved');
		  })
	  }
  },
  mounted(){
	  this.addRow()
  }
})
</script>
@endsection