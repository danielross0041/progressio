<?php
namespace App\Http\Controllers\Customer\Teacher;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\{bookings};
class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function reports(){
		$results = bookings::where('teacher_id',Auth::user()->id)->where('status',2)->paginate(10);
        return view('customer.teacher.dashboard')->with('title','Lesson Reports')
		->with('results',$results)->with('modifyTitle','Lesson Reports');
    }
}