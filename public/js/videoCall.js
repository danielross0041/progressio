var options = {
	appId: "fd084a2f198d4d019fdd38ce6468f7da",
	channel: "progressio"+channelid,
	token: "",
	role: (requestType=='tutor'?"host":"audience")
};
var rtc = {
	client: null,
	localAudioTrack: null,
	localVideoTrack: null,
};
var client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
async function startChatWithToken(){
	options.token = await generateToken()
	console.log(options);
	if(options.role=='host'){
		rtc.client = AgoraRTC.createClient({ mode: "live", codec: "vp8" });
		rtc.client.setClientRole(options.role);
		await rtc.client.join(options.appId, options.channel, options.token, uid);
		rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
		rtc.localVideoTrack = await AgoraRTC.createCameraVideoTrack();//createScreenVideoTrack
		await rtc.client.publish([rtc.localAudioTrack, rtc.localVideoTrack]);
		/*await rtc.client.publish(rtc.localVideoTrack);
		createScreenVideoTrack({
			encoderConfig: "1080p_1",
			optimizationMode: "detail"
		},"enable")*/
	}else{
		rtc.client = AgoraRTC.createClient({ mode: "live", codec: "vp8" });
        rtc.client.setClientRole(options.role);
        await rtc.client.join(
          options.appId,
          options.channel,
          options.token,
          uid
        );
        rtc.client.on("user-published", async (user, mediaType) => {
          await rtc.client.subscribe(user, mediaType);
          if (mediaType === "video") {
            const remoteVideoTrack = user.videoTrack;
            const playerContainer = document.createElement("div");
            playerContainer.id = user.uid.toString();
			if(classroomappa.shareScreenType!=true){
				playerContainer.style.width = "640px";
				playerContainer.style.height = "480px";
			}else{
				playerContainer.style.width = "100%";
				playerContainer.style.height = "100vh";
			}
            document.getElementById("me").append(playerContainer);
            remoteVideoTrack.play(playerContainer);
          }
          if (mediaType === "audio") {
            const remoteAudioTrack = user.audioTrack;
            remoteAudioTrack.play();
          }
        });
        rtc.client.on("user-unpublished", (user) => {
          const playerContainer = document.getElementById(user.uid);
          playerContainer.remove();
        });
	}
}
async function generateToken(){
	var url = (requestType=='tutor'?base_url('customer/agora-token/'+bookingid+'/'+uid):base_url('customer/agora-token-viewer/'+bookingid+'/'+uid))
	return fetch(url).then((e)=>{
      return e.json()
    }).then((e)=>{
      return e.token;
    })
}


startChatWithToken();
const socket = io("https://himsportal.com:9002");
var st;
async function setUpSyncBoard(){
    if(requestType=='tutor'){
        st = setInterval(function(){
			classroomappa.pages[0].stage.toJSON()
			let pages = []
			for(let q = 0; q < classroomappa.pages.length; q++){
				pages.push(classroomappa.pages[q].stage.toJSON())
			}
            socket.emit(`sendmsg`,{
                msg: JSON.stringify(pages),
                uid: uid,
                fid: channelid,
            });
        },1500)
    }
}
setUpSyncBoard()
socket.on('sendmsg'+channelid,async function (data){
    if(requestType!='tutor'){
		classroomappa.page = 0
		var json_temp = JSON.parse(data.msg)
		for(let i =0; i < json_temp.length; i++){
			if(classroomappa.pages[i]){
				classroomappa.pages[i].stage.destroy()
			}else{
				classroomappa.pages.push({
				  page: classroomappa.page,
				  stage: undefined,
				  layer: undefined
				})
			}
			await classroomappa.$nextTick()
			try{
				var stage = Konva.Node.create(json_temp[i], ('container'+i));
				classroomappa.pages[i].stage = stage
				for(j = 0; j < stage.find('Image').length; j++){
					let res = await addImageProcess(stage.find('Image')[j].attrs.imageUrl)
					stage.find('Image')[i].image(res)
				}
			}catch(ex){}
			classroomappa.page++;
		}
        //$('#img_container').attr('src',data.msg);
    }
});
socket.on('sharescreen'+channelid,async function (data){
    if(requestType!='tutor'){
		classroomappa.shareScreenType = data.msg
    }else{
		if(data.msg==true){
			await rtc.client.unpublish(rtc.localAudioTrack);
			await rtc.client.unpublish(rtc.localVideoTrack);
			//rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
			rtc.localVideoTrack = await AgoraRTC.createScreenVideoTrack({
				encoderConfig: "1080p_1",
				optimizationMode: "detail"
			},"enable")
			await rtc.client.publish(rtc.localVideoTrack);
		}else{
			await rtc.client.unpublish(rtc.localVideoTrack);
			rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
			rtc.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
			await rtc.client.publish([rtc.localAudioTrack, rtc.localVideoTrack]);
		}
	}
});
function addImageProcess(src){
  return new Promise((resolve, reject) => {
    let img = new Image()
    img.onload = () => resolve(img)
    img.onerror = reject
    img.src = src
  })
}