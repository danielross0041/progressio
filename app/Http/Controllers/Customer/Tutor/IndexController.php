<?php
namespace App\Http\Controllers\Customer\Tutor;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Model\m_flag;
use App\Model\tutor_details;
use App\Model\User;
use App\Model\{bookings, tutor_subjects};
use Illuminate\Support\Str;

class IndexController extends Controller
{
	public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function booking_tutor_listing()
    {
        $bookings = bookings::where('tutor_id',Auth::user()->id)->get();
        return view('customer.tutor.booking')->with('title','Booking Report')->with(compact('bookings'));
    }
	public function dashboard(){
		$results = bookings::where('tutor_id',Auth::user()->id)
		->orderBy('date','desc')->where('date','>=',date('Y-m-d'))->paginate(10);
		return view('customer.tutor.dashboard')->with('title','Tutor Dashboard')
		->with(compact('results'))->with('showTeacher',true);
	}
	public function booking_requests(){
		$results = bookings::where('tutor_id',0)
		->orderBy('date','desc')->where('date','>=',date('Y-m-d'))->paginate(10);
		return view('customer.tutor.requests')->with('title','Tutor Dashboard')
		->with(compact('results'))->with('showTeacher',true);
	}
	public function accept_requests(bookings $booking){
		$booking->tutor_id = Auth::user()->id;
		$booking->status=0;
		$booking->cancel_reason='';
		$booking->save();
		return redirect()->route('tutor.dashboard')->with('notify_success','Booking Accepted');
	}
	public function cancelBooking(bookings $booking){
		$booking->status=1;
		$booking->tutor_id=0;
		$booking->cancel_reason = 'Tutor Cancelled the booking on '.date('Y-m-d h:i A');
		$booking->save();
		return back()->with('notify_success','Booking Cancelled');
	}
	public function index(){
		$universities=m_flag::where('is_active',1)->where('flag_type','TUTORUNIVERSITIES')->get();
		$subjects=m_flag::where('is_active',1)->where('flag_type','SUBJECTS')->get();
		return view('customer.tutor.panel')->with('title','Tutor Profile Update')
		->with(compact('universities','subjects'));
	}
	public function updateprofile(Request $request){
		// if($request->email!=Auth::user()->email){
		// 	$check = User::where('email',$request->email)->where('id','<>',Auth::user()->id)->count();
		// 	if($check>0){
		// 		$this->echoErrors("Email already taken");
		// 		//abort(422,"Unprocessable entity");
		// 		exit();
		// 	}
		// }
		// tutor_subjects::where('tutor_id',Auth::user()->id)->delete();
		// foreach($request->subjects as $k=>$v){
		// 	$tutor_subjects = new tutor_subjects;
		// 	$tutor_subjects->subject_id=$v;
		// 	$tutor_subjects->tutor_id = Auth::user()->id;
		// 	$tutor_subjects->save();
		// }

		tutor_details::where('tutor_id',Auth::user()->id)
		->update([
			'brief_description'=>$request->brief_description,
			'per_hour_price'=>$request->per_hour_price,
			'subject'=>$request->subjects,
		]);
		$arr = array();
		// $arr = [
		// 	'name'=>$request->name,
		// 	'email'=>$request->email,
		// ];
		if($request->file('profile_picture')){
			$custom_file_name = time().'-'.$request->file('profile_picture')->getClientOriginalName();
			$arr['profile_image'] = $request->file('profile_picture')->storeAs('Uploads/users/'.md5(Str::random(20)),$custom_file_name,'public');
		}
		User::where('id',Auth::user()->id)->update($arr);
		$this->echoSuccess("Updated");
	}
	public function chat(bookings $booking){
		$booking->chat()->where('user_id',Auth::user()->id)->update(['is_read'=>1]);
		$title = 'Chat #'.$booking->id;
		$chat = $booking->chat()->orderBy('id','asc')->get();
		return view('customer.pupil.chat')->with(compact('booking','title','chat'));
	}
	public function endsession(bookings $booking){
		$title = 'End Session #'.$booking->id;
		return view('customer.tutor.endsession')->with(compact('booking','title'));
	}
	public function updatereport(bookings $booking, Request $request){
		$booking->status = 2;
		$booking->save();
		foreach($request->lesson_title as $key=>$value){
			$booking->pupils()->where('id',$key)->update([
				'lesson_title'=>$request->lesson_title[$key],
				'what_covered'=>$request->what_covered[$key],
				'pupil_did_well'=>$request->pupil_did_well[$key],
				'what_cover_nextime'=>$request->what_cover_nextime[$key],
				'pupil_struggle'=>$request->pupil_struggle[$key],
			]);
		}
		return back()->with('notify_success','Report Updated');
	}
}