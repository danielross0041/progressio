<?php
namespace App\Http\Controllers;
use Helper;
use View;
use Illuminate\Support\Str;
use App\Http\Requests\ParentRequest;
use App\Model\User;
use App\Model\tutor_details;
use App\Model\m_flag;
use Illuminate\Http\Request;
use Hash;
use Session;

class ParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
	public function index () {
		return view('parent.register')->with('title','Parent Register')
		->with('parentfirstMenu',true);
	}
	public function store(ParentRequest $request){
		$user =User::create([
			'email'=>$request->email,
			'password'=>Hash::make($request->password),
			'is_deleted'=>0,
			'is_active'=>1,
			'name'=>$request->name,
			'user_type'=>4
		]);
		Session::put('registered_tutor_current',$user->id);
		tutor_details::create([
			'tutor_id'=>$user->id,
			'phone'=>$request->phone,
		]);
		$this->echoSuccess($user->id);
	}
}
