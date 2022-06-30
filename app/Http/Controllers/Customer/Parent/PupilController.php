<?php
namespace App\Http\Controllers\Customer\Parent;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use App\Model\school;
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
        return view('customer.parent.pupil.index')->with('title','Pupil')
        ->with(compact('pupils'));
    }
    public function add(){
        $school = school::where('is_active',1)->where('is_verified',0)->orWhere('is_verified',null)->get();
        return view('customer.parent.pupil.add')->with('title','Add Pupil')->with(compact('school'));
    }
    
    public function store(SchoolTeacherValidate $request){
        $post_feilds = array();
        $post_feilds['name'] = $_POST['name'];
        $post_feilds['email'] = $_POST['email'];
        $post_feilds['is_active'] = 1;
        $post_feilds['user_type'] = 2;
        $post_feilds['school_id'] = Auth::user()->id;
        $post_feilds['password'] = Hash::make('12345678');
        if (isset($_POST['school_id']) && $_POST['school_id'] != '') {
            $post_feilds['pupil_school_id'] = $_POST['school_id'];
        } elseif (isset($_POST['school_name']) && $_POST['school_name'] != '') {
            $school = User::create([
                'email'=>$_POST['school_email'],
                'name'=>$_POST['school_name'],
                'password'=>Hash::make('12345678'),
                'is_active'=>1,
                'user_type'=>0,
            ]);
            $schoolDetail =school::create([
                'school_id'=>$school->id,
                'area'=>$_POST['school_area'],
                'postal_code'=>$_POST['school_postal_code'],
                'is_verified'=>0
            ]);
            $post_feilds['pupil_school_id'] = $school->id;
        }
        User::create($post_feilds);
        return redirect()->route('parent.pupil.list')->with('notify_success','Sent Email to student you requested for, For further process');
    }
}
