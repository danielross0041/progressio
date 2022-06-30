<?php
namespace App\Http\Controllers\Customer\School;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use App\Http\Requests\SchoolTeacherValidate;
class PupilController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index(){
        $pupils=User::where('user_type',2)->where('school_id',Auth::user()->id)->paginate(20);
        return view('customer.school.pupil.index')->with('title','Pupil')
        ->with(compact('pupils'));
    }
    public function add(){
        return view('customer.school.pupil.add')->with('title','Add Pupil');
    }
    public function store(SchoolTeacherValidate $request){
        User::create([
            'user_type'=>2,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('12345678'),
            'is_active'=>0,
            'school_id'=>Auth::user()->id
        ]);
        return redirect()->route('school.pupil.list')->with('notify_success','Sent Email to student you requested for, For further process');
    }
}
