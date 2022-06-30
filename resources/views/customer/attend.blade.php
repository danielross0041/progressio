<!DOCTYPE html>
<html>
<head>
<title>{{$title}}</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link href="{{asset('css/classroom.css')}}" rel="stylesheet" >
</head>
<body>
<input type="hidden" id="web_base_url" value="{{url('/')}}" />
<section class="main-layout">
<div id="classroomappa" class="container-fluid">

<div class="row flex-right">
<div class="col-md-10">
<div class="top-bar">
<img src="{{asset($logo)}}" class="img-responsive vle-logo" />
 <ul>
	@if(Auth::user()->user_type==3)
		<li v-if="modeActive=='changebg'">Background Color: <input v-model="bgColorModel" type="color" /></li>
		<li v-if="modeActive=='drawing'">Drawing Color: <input v-model="drawing.drawingColor" type="color" /></li>
		<li v-if="modeActive=='drawing'">Brush Stroke: <input v-model:number="drawing.eraseWidth" type="number" min="1" /></li>
		<!--textbox:{
			fontSize: 30,
			fontFamily: 'Calibri',
			fill: '#000000',
			stroke: '#ffffff',
			strokeWidth: 0,
		},-->
		<li v-if="modeActive=='text'">Font Size: <input v-model:number="textbox.fontSize" type="number" min="1" /></li>
		<li v-if="modeActive=='text'">Color: <input v-model="textbox.fill" type="color" /></li>
		<li v-if="modeActive=='text'">Stroke Size: <input v-model:number="textbox.strokeWidth" type="number" min="0" /></li>
		<li v-if="modeActive=='text'&&textbox.strokeWidth>0">Stroke Color: <input v-model="textbox.stroke" type="color"  /></li>
		<li v-if="modeActive=='text'">Text: <input v-model="textbox.currentText" type="text"  /></li>
		<!--<li><a href=""><i class="fa fa-database" aria-hidden="true"></i>Position</a></li>
		<li><a href=""><i class="fa fa-tint" aria-hidden="true"></i></a></li>
		<li><a href=""><i class="fa fa-unlock" aria-hidden="true"></i></a></li>
		<li><a href=""><i class="fa fa-clone" aria-hidden="true"></i></a></li>-->
		<li><a href="#!" @click="deleteAnySelected"><i class="fa fa-trash-o" aria-hidden="true"></i></a></li> 
		<li class="hdr-download"><a href=""><i class="fa fa-download" aria-hidden="true"></i>Download</a></li> 	
	@endif
 </ul>
</div>
</div>
</div>
<div class="videocallapp" :class="shareScreenType==true?'show':''">
<div class="inn-right-window" id="me">
	 
</div>
<button onclick="$('.videocallapp').toggleClass('show')" type="button" class="cater">
	<i class="fa fa-arrow-circle-down"></i>
</button>
<button onclick="$('.videocallapp').toggleClass('show')" type="button" class="closer">
	<i class="fa fa-times"></i>
</button>
</div>
<div id="classroomapp" class="row">


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
<input type="file" @change="board_image_file_add" id="board_image_file" class="form-control" />
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
	
	<div class="col-md-1">
	<div class="sidenav">
		<ul class="list-unstyled">
			@if(Auth::user()->user_type==3)
				<li><a @click="drawFree" href="#!"><i class="fa fa-edit" aria-hidden="true"></i>Draw</a></li>
				<li><a @click="addText" href="#!"><i class="fa fa-file-text-o" aria-hidden="true"></i>Text</a></li>
				<!--<li><a><i class="fa fa-file-image-o" aria-hidden="true"></i>Photos</a></li>-->
				<li><a href="#!" onclick="ImageOnBoard()"><i class="fa fa-upload" aria-hidden="true"></i>Upload</a></li>
				<li><a href="#!" @click="changeBg"><i class="fa fa-undo" aria-hidden="true"></i>Back</a></li>
				<li><a href="#!" @click="shareScreen"><i class="fa fa-archive" aria-hidden="true"></i>Share Screen</a></li>
			@endif
		</ul>
	</div>
	</div>

	<div class="col-md-11">
	<div class="center-window">
	 
	 <div v-for="(page, pagek) in pages" :key="pagek" class="center-blk-cvr">
	<ul>
	@if(Auth::user()->user_type==3)
	 <li><a href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></li>
	 <li><a href=""><i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
	 <li><a @click="replicate(pagek)" href="#!"><i class="fa fa-clone" aria-hidden="true"></i></a></li>
	 <li v-if="pages.length>1"><a @click="removePage(pagek)" href="#!"><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
	 <li><a @click="addPage()" href="#!"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></li>
	 @endif
	</ul>
	 <div :id="'container'+pagek" class="center-blk"></div>
	 </div>
	 
	</div>
	</div>
	
	<!--<div class="col-md-2">
	<div class="right-window">
	 <div class="inn-right-window" id="me">
	 
	 </div>
	</div>
	</div>-->

</div>

</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/3af70af034.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://unpkg.com/konva@8/konva.min.js"></script>
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
<script src="{{asset('js/ycommon.js')}}"></script>
<script src="{{asset('js/videoCall.js')}}"></script>
<script>
(function($){
$.fn.visible = function(partial){
  var $t        = $(this),
	$w        = $(window),
	viewTop     = $w.scrollTop(),
	viewBottom    = viewTop + $w.height(),
	_top      = $t.offset().top,
	_bottom     = _top + $t.height(),
	compareTop    = partial === true ? _bottom : _top,
	compareBottom = partial === true ? _top : _bottom;  
return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
};
})(jQuery);
$(window).scroll(function(){
	setTimeout(function(){ showvisible() }, 100);
});
function showvisible(){
$('.center-blk').each(function(){
var visible = $(this).visible('partial');
var elem = $(this);
if(visible) {
	classroomappa.currentPage = $(this).attr('id')
}
});
}
function ImageOnBoard(){
	$('#imageUpload').modal('toggle');
}

var curheight = $('.center-blk').height()
var curwidth = $('.center-blk').width()
var classroomappa = new Vue({
  el: '#classroomappa',
  data: {
	randomeId: 99999999999999,
    pages:[],
	page: 0,
	currentPage: 'container0',
	drawing:{
		isPaint: false,
		mode: 'brush',
		eraseWidth: 5,
		lastLine: undefined,
		drawingColor: '#df4b26'
	},
	textbox:{
		fontSize: 30,
		fontFamily: 'Calibri',
		fill: '#000000',
		stroke: '#ffffff',
		strokeWidth: 1,
		currentText: 'Text Here',
	},
	modeActive: 'drawing',
	bgColorModel: '#ffffff',
	shareScreenType: false,
  },
  methods:{
	async shareScreen(){
		this.shareScreenType = !this.shareScreenType
		await this.$nextTick()
		socket.emit(`sharescreen`,{
			msg: this.shareScreenType,
			uid: uid,
			fid: channelid,
		});
	},
	  changeBg(){
		  this.modeActive = 'changebg'
	  },
	  async board_image_file_add(){
		var input = $('#board_image_file')[0]
		if (input.files && input.files[0]) {
			//front.imageupload
			var formData = new FormData();
			formData.append('file', $('#board_image_file')[0].files[0]);
			var _url = await fetch('{{route('front.imageupload')}}', {
			  method: 'POST',
			  body: formData
			}).then(e=>{
				return e.json()
			}).then(e=>{
				return e.url
			})
			Konva.Image.fromURL(_url, function (darthNode) {
				darthNode.setAttrs({
				  x: 50,
				  y: 50,
				  draggable: true,
				hasClippings: false,
				clippingId: '',
				objlastposy: 0,
				objlastposx: 0,
				imageUrl: _url
				});
				darthNode.on('click', function () {
					if(this.attrs.hasClippings===false){
						var id  = 'clipping'+classroomappa.randomeId
						this.attrs.hasClippings=true
						this.attrs.clippingId=id
						classroomappa.randomeId--;
						var tr2 = new Konva.Transformer({
							nodes: [this],
							keepRatio: false,
							enabledAnchors: [
							  'top-left',
							  'top-right',
							  'bottom-left',
							  'bottom-right',
							],
							id: id,
							name: 'transformers',
						  });
						classroomappa.addInLayer(tr2);
					}else{
						this.attrs.hasClippings=false
						var shape = classroomappa.currentStage.find('#'+this.attrs.clippingId)[0];
						shape.destroy()
					}
				});
				classroomappa.addInLayer(darthNode);
				//classroomappa.restrictBound(yoda);
				ImageOnBoard()
			  });
			/*var reader = new FileReader();
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
						hasClippings: false,
						clippingId: '',
						objlastposy: 0,
						objlastposx: 0,
					});
					yoda.on('click', function () {
						if(this.attrs.hasClippings===false){
							var id  = 'clipping'+classroomappa.randomeId
							this.attrs.hasClippings=true
							this.attrs.clippingId=id
							classroomappa.randomeId--;
							var tr2 = new Konva.Transformer({
								nodes: [this],
								keepRatio: false,
								enabledAnchors: [
								  'top-left',
								  'top-right',
								  'bottom-left',
								  'bottom-right',
								],
								id: id,
								name: 'transformers',
							  });
							classroomappa.addInLayer(tr2);
						}else{
							this.attrs.hasClippings=false
							var shape = classroomappa.currentStage.find('#'+this.attrs.clippingId)[0];
							shape.destroy()
						}
					});
					classroomappa.addInLayer(yoda);
					//classroomappa.restrictBound(yoda);
					ImageOnBoard()
				};
				imageObj.src = e.target.result;
			}
			reader.readAsDataURL(input.files[0]);*/
		}
	  },
	  async replicate(index){
		this.pages.push({
			page: this.page,
			stage: undefined,
			layer: undefined
		})
		this.page++;
		await this.$nextTick()
		var json = classroomappa.currentStage.toJSON();
		var stage = Konva.Node.create(json, ('container'+(this.pages.length-1)));
		this.pages[(this.pages.length-1)].stage = stage
		this.pages[(this.pages.length-1)].layer = new Konva.Layer();
		this.pages[(this.pages.length-1)].stage.add(this.pages[(this.pages.length-1)].layer);
	  },
	  async addPage(){
		  this.pages.push({
			  page: this.page,
			  stage: undefined,
			  layer: undefined
		  })
		  this.page++;
		  await this.$nextTick()
		  this.pages[(this.pages.length-1)].stage = new Konva.Stage({
			container: 'container'+(this.pages.length-1),
			width: curwidth,
			height: curheight,
		  })
		  this.pages[(this.pages.length-1)].layer = new Konva.Layer();
		  this.pages[(this.pages.length-1)].stage.add(this.pages[(this.pages.length-1)].layer);
	  },
	  removePage(key){
		  this.pages[key].layer.destroy()
		  this.pages[key].stage.destroy()
		  this.pages.splice(key,1)
	  },
	  addInLayer(obj){
		  this.currentLayer.add(obj);
	  },
	  deleteAnySelected(){
		var transformers = classroomappa.currentStage.find('.transformers')
		for(let i = 0; i < transformers.length; i++){
			transformers[i].destroy();
		}
		var transformers = classroomappa.currentStage.find('.textboxes')
		for(let i = 0; i < transformers.length; i++){
			if(transformers[i].attrs.hasClippings==true){
				transformers[i].destroy();
			}
		}
	  },
	  addText(){
		this.resetDrawing()
		this.modeActive = 'text';
		var stage = this.currentStage;
		var simpleText = new Konva.Text({
			x: stage.width() / 2,
			y: 15,
			text: 'Text Here',
			fontSize: 30,
			fontFamily: 'Calibri',
			fill: 'black',
			draggable: true,
			hasClippings: false,
			clippingId: '',
			objlastposy: 0,
			objlastposx: 0,
			name: 'textboxes',
			fillAfterStrokeEnabled: true,
			stroke: '#ffffff',
			strokeWidth: 1,
		});
		simpleText.on('click', function () {
			if(this.attrs.hasClippings===false){
				classroomappa.resetDrawing()
				classroomappa.modeActive = 'text';
				var id  = 'clipping'+classroomappa.randomeId
				this.attrs.hasClippings=true
				this.attrs.clippingId=id
				classroomappa.randomeId--;
				var tr2 = new Konva.Transformer({
					nodes: [this],
					ignoreStroke: true,
					//centeredScaling: true,
					//rotationSnaps: [0, 90, 180, 270],
					//resizeEnabled: false,
					keepRatio: true,
					enabledAnchors: [
					  'top-left',
					  'top-right',
					  'bottom-left',
					  'bottom-right',
					],
					id: id,
					name: 'transformers',
				  });
				classroomappa.addInLayer(tr2);
			}else{
				classroomappa.resetDrawing()
				classroomappa.modeActive = '';
				this.attrs.hasClippings=false
				var shape = classroomappa.currentStage.find('#'+this.attrs.clippingId)[0];
				shape.destroy()
			}
		});
		this.addInLayer(simpleText);
		//this.restrictBound(simpleText);
	  },
	  resetDrawing(){
		this.drawing.lastLine = undefined;  
		this.drawing.isPaint = false
	  },
	  drawFree(){
			this.modeActive = 'drawing';
			var stage = this.currentStage;
			stage.off('mouseover');
			stage.off('mouseout');
			stage.off('mousedown');
			stage.off('mouseup');
			stage.off('mousemove');
			stage.off('touchstart');
			stage.off('touchmove');
			stage.off('touchend');
			stage.on('mousedown touchstart', function (e) {
				classroomappa.drawing.isPaint = true;
				if(classroomappa.modeActive=='drawing'){
					var stage = classroomappa.currentStage;
					var pos = stage.getPointerPosition();
					classroomappa.drawing.lastLine = new Konva.Line({
						stroke: classroomappa.drawing.drawingColor,
						strokeWidth: classroomappa.drawing.eraseWidth,
						globalCompositeOperation: classroomappa.drawing.mode === 'brush' ? 'source-over' : 'destination-out',
						lineCap: 'round',
						points: [pos.x, pos.y, pos.x, pos.y],
					});
					classroomappa.addInLayer(classroomappa.drawing.lastLine);
				}
			});
			stage.on('mousemove touchmove', function (e) {
				if(classroomappa.modeActive=='drawing'){
					if (!classroomappa.drawing.isPaint) {
					  return;
					}
					e.evt.preventDefault();
					var stage = classroomappa.currentStage;
					const pos = stage.getPointerPosition();
					var newPoints = classroomappa.drawing.lastLine.points().concat([pos.x, pos.y]);
					classroomappa.drawing.lastLine.points(newPoints);
				}
			});
			stage.on('mouseup touchend', function () {
				if(classroomappa.modeActive=='drawing'){
					classroomappa.drawing.isPaint = false;
				}
			});
	  },
		restrictBound(obj){
			this.resetDrawing()
			this.modeActive = 'dragging';
			obj.on('dragmove', () => {
				classroomappa.resetDrawing()
				classroomappa.modeActive = 'dragging';
				var objlastposy = obj.attrs.objlastposy
				var objlastposx = obj.attrs.objlastposx
				var stage = classroomappa.currentStage;
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
				obj.attrs.objlastposy = obj.y();
				obj.attrs.objlastposx = obj.x();
			});
		}
  },
  watch:{
	bgColorModel(){
		this.currentStage.container().style.backgroundColor = this.bgColorModel;
	},
	textbox:{
	  handler(o,n){
		var transformers = classroomappa.currentStage.find('.textboxes')
		for(let i = 0; i < transformers.length; i++){
			if(transformers[i].attrs.hasClippings==true){
				transformers[i].setText(this.textbox.currentText)
				transformers[i].setFill(this.textbox.fill)
				transformers[i].setFontSize(this.textbox.fontSize)
				if(this.textbox.strokeWidth>0){
					transformers[i].setStroke(this.textbox.stroke)
					transformers[i].setStrokeWidth(this.textbox.strokeWidth)
				}
			}
		}
	  },
	  deep: true,
	}
  },
  mounted(){
	  this.addPage()
  },
  computed:{
	  currentPageId(){
		  return parseInt(this.currentPage.replace('container',''))
	  },
	  currentStage(){
		  return this.pages[this.currentPageId].stage;
	  },
	  currentLayer(){
		  return this.pages[this.currentPageId].layer;
	  }
  }
})
</script>
</body>
</html>