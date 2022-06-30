<?php
namespace App\Http\Controllers\Customer\Parent;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\{bookings, transactions};
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index(){
    	// dd("here");
		$results = bookings::where('teacher_id',Auth::user()->id)->where('date','>=',date('Y-m-d'))->paginate(10);
        return view('customer.parent.panel')->with('title','Parent Panel')
		->with('results',$results);
    }
    public function booking_tutor_listing()
    {
        $bookings = bookings::where('teacher_id',Auth::user()->id)->get();
        // dd($bookings);
        return view('customer.parent.booking')->with('title','Booking Reports')->with(compact('bookings'));
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
}
