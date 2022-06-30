<?php
namespace App\Http\Controllers\Customer\School;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\{User, bookings};
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
	public function anualreports(){
		$results = Helper::returnMod('anualreports')->where('school_id',Auth::user()->id)->orderBy('id','desc')->get();
		return view('customer.school.anualreport')->with('title','Annual Report')
		->with(compact('results'));
	}
	public function index(){
		$teachers = [];
		$teachers[] = Auth::user()->id;
		$teachers_db = User::where('user_type',1)->where('school_id',Auth::user()->id)->get()->pluck('id');
		array_push($teachers,...$teachers_db);
		$results = bookings::whereIn('teacher_id',$teachers)
		->orderBy('date','desc')->where('date','>=',date('Y-m-d'))->paginate(10);
        return view('customer.teacher.panel')->with('title','School Panel')
		->with('results',$results)->with('showTeacher',true);
	}
}
