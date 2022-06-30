<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\User;
use App\Model\bookings;
include  app_path('Helpers/Agora/RtmTokenBuilder.php');
class AgoraController extends Controller
{
    public function generateAgoraToken(bookings $booking, User $user){
		$appID = "fd084a2f198d4d019fdd38ce6468f7da";
		$appCertificate = "c7d9e9db95f848288becb4527169e2f5";
		$channelName = "progressio".$user->id;
		//var_dump($channelName);
		$uid = $user->id;
		$uidStr = "".$user->id."";
		$role = \RtcTokenBuilder::RolePublisher;
		$expireTimeInSeconds = (3600*10);
		$currentTimestamp = (new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp();
		$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

		$token = \RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
		return response()->json(['token'=>$token]);
    }
	public function generateAgoraTokenViewer(bookings $booking,User $user){
		$appID = "fd084a2f198d4d019fdd38ce6468f7da";
		$appCertificate = "c7d9e9db95f848288becb4527169e2f5";
		$channelName = "progressio".$booking->tutor_id;
		$uid = $user->id;//$user->id;
		$uidStr = "".$user->id."";
		$role = \RtcTokenBuilder::RoleSubscriber;
		$expireTimeInSeconds = (3600*10);
		$currentTimestamp = (new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp();
		$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

		$token = \RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
		return response()->json(['token'=>$token]);
    }
}