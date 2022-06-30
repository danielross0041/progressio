<?php
namespace App\Http\Controllers\Customer\Teacher;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\m_flag;
use App\Model\tutor_details;
use App\Model\User;
use App\Model\{bookings, transactions};
use Illuminate\Http\Request;
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
    public function dashboard(){
		$results = bookings::where('teacher_id',Auth::user()->id)->where('date','>=',date('Y-m-d'))->paginate(10);
        return view('customer.teacher.dashboard')->with('title','Teacher Panel')
		->with('results',$results);
    }
    public function index(){
		$universities=m_flag::where('is_active',1)->where('flag_type','TUTORUNIVERSITIES')->get();
		$subjects=m_flag::where('is_active',1)->where('flag_type','SUBJECTS')->get();
		return view('customer.teacher.panel')->with('title','Teacher Profile Update')
		->with(compact('universities','subjects'));
	}
    public function booking_tutor_listing()
    {
        $bookings = bookings::where('teacher_id',Auth::user()->id)->get();
        // dd($bookings);
        return view('customer.teacher.booking')->with('title','Booking Reports')->with(compact('bookings'));
    }
	public function cancelBooking(bookings $booking){
		$booking->status=1;
		$booking->cancel_reason = 'Teacher Cancelled the booking on '.date('Y-m-d h:i A');
		$booking->save();
		return back()->with('notify_success','Booking Cancelled');
	}
	public function markcomplete(bookings $booking){
		$booking->status=3;
		$booking->cancel_reason = '';
		$booking->save();
		transactions::create([
			'user_id'=>$booking->teacher_id,
			'coin'=>$booking->total,
			'reason_for_transaction'=>Auth::user()->name.' Completed booking #'.$booking->id,
			'is_debit'=>0,
		]);
		transactions::create([
			'user_id'=>$booking->tutor_id,
			'coin'=>$booking->total,
			'reason_for_transaction'=>'Amount for #'.$booking->id,
			'is_debit'=>1,
		]);
		return back()->with('notify_success','Booking Marked Completed');
	}
	public function updateprofile(Request $request){
		$token_ignore = ['_token' => '' ];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        $post_feilds['tutor_id'] = Auth::user()->id;
		// dd($post_feilds);
		
		$check = tutor_details::where('tutor_id',Auth::user()->id)->first();
		if ($check) {
			$update = tutor_details::where('tutor_id',Auth::user()->id)->update($post_feilds);
		} else{
			$create = tutor_details::create($post_feilds);
		}
		
		// $arr = [
		// 	'name'=>$request->name,
		// 	'email'=>$request->email,
		// ];
		if($request->file('profile_picture')){
			$arr = array();
			$custom_file_name = time().'-'.$request->file('profile_picture')->getClientOriginalName();
			$arr['profile_image'] = $request->file('profile_picture')->storeAs('Uploads/users/'.md5(Str::random(20)),$custom_file_name,'public');
			User::where('id',Auth::user()->id)->update($arr);
		}
		$this->echoSuccess("Updated");
	}
}
