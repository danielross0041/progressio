<?php
namespace App\Http\Controllers\Customer\Pupil;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Model\{bookings, User};
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
	public function index(){
		$results = Auth::user()->pupilsessions()->orderBy('id','desc')->where('date','>=',date('Y-m-d'))->paginate(10);
		return view('customer.pupil.panel')->with('title','Pupil Dashboard')
		->with(compact('results'));
	}
	public function chat(bookings $booking){
		$booking->chat()->where('user_id',Auth::user()->id)->update(['is_read'=>1]);
		$title = 'Chat #'.$booking->id;
		$chat = $booking->chat()->orderBy('id','asc')->get();
		return view('customer.pupil.chat')->with(compact('booking','title','chat'));
	}
	public function report(bookings $booking){
		$title = 'Report #'.$booking->id;
		return view('customer.pupil.report')->with(compact('booking','title'));
	}
}