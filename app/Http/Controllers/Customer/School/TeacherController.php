<?php
namespace App\Http\Controllers\Customer\School;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use App\Http\Requests\SchoolTeacherValidate;
class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index(){
        $teachers=User::where('user_type',1)->where('school_id',Auth::user()->id)->paginate(20);
        return view('customer.school.teacher.index')->with('title','Teachers')
        ->with(compact('teachers'));
    }
    public function add(){
        return view('customer.school.teacher.add')->with('title','Add Teacher');
    }
    public function store(SchoolTeacherValidate $request){
        User::create([
            'user_type'=>1,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('12345678'),
            'is_active'=>0,
            'school_id'=>Auth::user()->id
        ]);
        return redirect()->route('school.teacher.list')->with('notify_success','Sent Email to teacher you requested for, For further process');
    }
}
