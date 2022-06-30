<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\query_inbox;
use App\Model\chat;
use App\Model\bookings;
use App\Model\transactions;
use App\Model\User;
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
		$logo=Helper::OneColData('imagetable','img_path',"table_name='logo' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
		View()->share('logo',$logo);
        View()->share('config',$this->getConfig());
    }
    public function index(){
        $user = Auth::user();
		$updatelastlogin = User::find($user->id);
		$updatelastlogin->last_login = now();
		$updatelastlogin->save();
		if($user->user_type==1){
			return redirect()->route('teacher.dashboard');
		}
		if($user->user_type==2){
			return redirect()->route('pupil.panel');
		}
		if($user->user_type==3){
			return redirect()->route('tutor.dashboard');
		}
		if($user->user_type==0){
			return redirect()->route('school.panel');
		}
		if($user->user_type==4){
			return redirect()->route('parent.panel');
		}
        return view('customer.panel')->with('title',$user->name.' Dashboard')->with(compact('user'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('notify_success','Logged out successfully');
    }
    public function contactus(){
        $query_inbox = query_inbox::where('user_id', Auth::user()->id)->orderBy('id','asc')->get();
        return view('customer.contactus')->with('title','Contact Us')
        ->with(compact('query_inbox'));
    }
    public function contactussubmit(){
        $query_inbox=new query_inbox;
        $query_inbox->message=$_POST['message'];
        $query_inbox->user_id=Auth::user()->id;
        $query_inbox->admin_id=1;
        $query_inbox->sent_by='u';
        $query_inbox->save();
        return back()->with('notify_success','Message Sent');
    }
	public function bookingDetail(bookings $booking){
		return view('customer.bookingDetail')->with('title','Booking Detail #'.$booking->id)
        ->with(compact('booking'));
	}
	public function attend(bookings $booking){
		$allowOnly = [$booking->teacher_id,$booking->tutor_id];
		$arr = $booking->pupils->pluck('pupil_id');
		array_push($allowOnly,...$arr);
		if(in_array(Auth::user()->id,$allowOnly)){
			return view('customer.attend')->with('title','Meeting#'.$booking->id)
			->with(compact('booking'));
		}
	}
	public function sendchat(bookings $booking){
		$chat = $booking->chat()->create([
			'message'=>$_POST['message'],
			'user_id'=>Auth::user()->id
		]);
		return back()->with('notify_success','Message Sent');
	}
	public function transactions(){
		$transacitons = transactions::where('user_id',Auth::user()->id)->orderBy('id','desc');
		$transacitons = $transacitons->paginate(50);
		$current_balance = transactions::where('user_id',Auth::user()->id)->where('is_debit',1)->sum('coin');
		$spend_balance = transactions::where('user_id',Auth::user()->id)->where('is_debit',0)->sum('coin');
		$title = 'Transactions Report';
		return view('customer.transactions')
		->with(compact('current_balance','transacitons','title','spend_balance'));
	}
}
