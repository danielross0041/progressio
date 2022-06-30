@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
    <div class="container">
        @if(Auth::user()->user_type==3)
		<div class="row mt-3">
			<div class="col-md-12">
				<button class="btn" onclick="addText()">Add Text</button>
				<button class="btn" onclick="drawOnBoard()">Draw</button>
				<button class="btn" onclick="eraseOnBoard()">Erase</button>
				<button class="btn" onclick="ImageOnBoard()">Add Image</button>
				<button class="btn" onclick="EndSession()">End Session</button>
			</div>
		</div>
		@endif
        <div class="row mt-3 mb-3">
            <div class="col-md-9">
                @if(Auth::user()->user_type==3)
				<div id="container"></div>
				@else
				<img id="img_container" class="img-responsive" />
				@endif
			</div>
			<div class="col-md-3">
				<div id="me"></div>
			</div>
        </div>
    </div>
</section>
<div class="modal fade" id="imageUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
				<input type="file" id="board_image_file" class="form-control" />
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
<style type="text/css">
#container{
	width:100%;
	border: .4px solid #8080802e;
}
.messages_das_sec {
    background: white !important;
}
</style>
@endsection
@section('js')
<script src="https://unpkg.com/konva@8/konva.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
var bookingid = {{$booking->id}};
var channelid = {{$booking->tutor_id}}
var uid = {{Auth::user()->id}}
var requestType = 'viewer';//api.generateAgoraTokenViewer
@if(Auth::user()->user_type==3)
	requestType = 'tutor';//api.generateAgoraToken
@endif
</script>
<script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
<script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
<script src="{{asset('js/videoCall.js')}}"></script>
@if(Auth::user()->user_type==3)
<script type="text/javascript">
var konvawidth = $('#container').width();
var konvaheight = 600;
var stage,layer, drawingEnabled=false, brushingEnabled=false;
(() => {
	stage = new Konva.Stage({
		container: 'container',
		width: konvawidth,
		height: konvaheight,
	});
	layer = new Konva.Layer();
	stage.add(layer);
	//agora implement	
})()
function ImageOnBoard(){
	$('#imageUpload').modal('toggle');
}
$('#board_image_file').change(function(){
	var input = $('#board_image_file')[0]
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			//e.target.result
			var imageObj = new Image();
			imageObj.onload = function () {
				var yoda = new Konva.Image({
					x: 50,
					y: 50,
					image: imageObj,
					width: imageObj.width,
					height: imageObj.height,
					draggable: true,
				});
				addCurEv(yoda);
				addInLayer(yoda);
				restrictBound(yoda);
				ImageOnBoard()
			};
			imageObj.src = e.target.result;
		}
		reader.readAsDataURL(input.files[0]);
	}
})
var isPaint = false;
var mode = 'brush', eraseWidth=5;
var lastLine;
function removeBrushEv(){
	stage.off('mouseover');
	stage.off('mouseout');
	stage.off('mousedown');
	stage.off('mouseup');
	stage.off('mousemove');
	stage.off('touchstart');
	stage.off('touchmove');
	stage.off('touchend');
}
function drawOnBoard(){
	removeBrushEv();
	mode = 'brush'
	eraseWidth = 5;
	if(drawingEnabled===false){
		generateNotification('1','Drawing Enabled')
		stage.on('mouseover', function () {
			document.body.style.cursor = 'crosshair';
		});
		stage.on('mouseout', function () {
			document.body.style.cursor = 'default';
		});
		drawingEnabled=true;
		drawEvent();
	}else{
		generateNotification('0','Drawing Disabled')
		drawingEnabled=false
		isPaint = false;
	}
}
function eraseOnBoard(){
	//drawingEnabled=false;
	//isPaint = false;
	drawOnBoard()
	mode = 'erase'
	eraseWidth = 30;
}
function drawEvent(){
	stage.on('mousedown touchstart', function (e) {
		isPaint = true;
		var pos = stage.getPointerPosition();
		lastLine = new Konva.Line({
			stroke: '#df4b26',
			strokeWidth: eraseWidth,
			globalCompositeOperation:
			mode === 'brush' ? 'source-over' : 'destination-out',
			lineCap: 'round',
			points: [pos.x, pos.y, pos.x, pos.y],
		});
		addInLayer(lastLine);
	});
	stage.on('mousemove touchmove', function (e) {
		if (!isPaint) {
          return;
        }
		e.evt.preventDefault();
		const pos = stage.getPointerPosition();
        var newPoints = lastLine.points().concat([pos.x, pos.y]);
        lastLine.points(newPoints);
	});
	stage.on('mouseup touchend', function () {
		isPaint = false;
	});
}
function addText(){
	removeBrushEv();
	swal({
		text: 'Add Text in Whiteboard',
		content: "input",
		button: {
			text: "Add Text",
		},
	}).then(function(text){
		if (!text) throw null;
		var simpleText = new Konva.Text({
			x: stage.width() / 2,
			y: 15,
			text: text,
			fontSize: 30,
			fontFamily: 'Calibri',
			fill: 'black',
			draggable: true,
		});
		addCurEv(simpleText);
		addInLayer(simpleText);
		restrictBound(simpleText);
	})
}
function addCurEv(obj){
	obj.on('mouseover', function () {
		document.body.style.cursor = 'pointer';
	});
	obj.on('mouseout', function () {
		document.body.style.cursor = 'default';
	});
}
var objlastposy = 0,objlastposx = 0;
function restrictBound(obj){
	obj.on('dragmove', () => {
		if(obj.y()<objlastposy){
			//going up
			obj.y(Math.max(obj.y(), 0));
		}else{
			if(obj.y()>(stage.height()-(obj.height()))){
				obj.y(Math.max((stage.height()-(obj.height())), 0));
			}
		}
		if(obj.x()<objlastposx){
			obj.x(Math.max(obj.x(), 0));
		}else{
			if(obj.x()>(stage.width()-(obj.width()))){
				obj.x(Math.max((stage.width()-(obj.width())), 0));
			}
		}
		objlastposy = obj.y();
		objlastposx = obj.x();
	});
}
function addInLayer(obj){
	layer.add(obj);
}

function EndSession(){
	window.location.href='{{route('tutor.endsession',[$booking])}}'
}
</script>
@endif
@endsection