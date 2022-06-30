<?php
namespace App\Http\Controllers\Adminiy;
use App\Http\Controllers\Controller;
use Auth;
use View;
use File;
use DB;
use Schema;
use Storage;
use Illuminate\Support\Facades\Hash;

use App\Model\ytables;
use App\Model\imagetable;
use App\Model\tutor_meeting_admin;
use App\Model\tutor_quiz_questions;
use App\Model\tutor_quiz_answers;
use App\Model\bookings;
use App\Model\User;
use App\Model\school;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolRequest;
use Validator;
use Artisan;
use Helper;
class IndexController extends Controller
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('v',config('app.vadminiy'));
        View()->share('favicon',$favicon);
    }
    public function panel()
    {
    	// return view('adminiy.crud.crud');
    	// dd("here");
    	$booking = bookings::where('status','!=',1)->get();
    	$total = 0;
    	foreach ($booking as $key => $value) {
    		$total +=$value->total;
    	}
    	// dd($total);
        $recentSignups = Helper::fireQuery("SELECT left(name,1) as _fc,users.*,imagetable.img_path from users left join imagetable on imagetable.table_name='users' and imagetable.type='1' and imagetable.ref_id = users.id order by users.id desc ".Helper::getPaginator(20));
        return view('adminiy.panel')->with(compact('recentSignups','total'));
    }
    public function crudGenerator(SchoolRequest $request)
    {
    	// dd($_POST);
    	$user = User::create([
			'name'=>$_POST['name'],
			'email'=>$_POST['email'],
			'user_type'=>0,
			'is_active'=>1,
			'is_deleted'=>0,
			'password'=>Hash::make('12345678'),
		]);
		$school = school::create([
			'postal_code'=>$_POST['postal_code'],
			'area'=>$_POST['area'],
			'school_id'=>$user->id,
			'is_verified'=>1,
		]);
		// dd($user);
		return back()->with('notify_success','School Created Successfully');

    }
    public function listing($type = '')
    {

    	if ($type == 1) {
    		$name = "School";
    		$form = '<form class="" id="generic-form" method="POST" action="'.route("adminiy.crudGenerator").'">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input type="hidden" name="record_id" id="record_id" value="">
                    <div class="row">
                        <div id="assignrole"></div>
                        <div class="col-md-12 col-sm-6 col-12" id="rank-label">
                            <div class="form-group start-date">
                                <label for="start-date" class="">Name:</label>
                                <div class="d-flex">
                                    <input id="name" placeholder="Name" name="name" class="form-control" type="text" autocomplete="off" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-12" id="role-label">
                            <div class="form-group end-date">
                                <label for="end-date" class="">Email:</label>
                                <div class="d-flex">
                                    <input id="email" placeholder="Email" name="email" class="form-control" type="text" autocomplete="off" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6" id="role-label">
                            <div class="form-group end-date">
                                <label for="end-date" class="">Area:</label>
                                <div class="d-flex">
                                    <input id="area" placeholder="Area" name="area" class="form-control" type="text" autocomplete="off" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6" id="role-label">
                            <div class="form-group end-date">
                                <label for="end-date" class="">Postal Code:</label>
                                <div class="d-flex">
                                    <input id="postal_code" placeholder="Postal Code" name="postal_code" class="form-control" type="text" autocomplete="off" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>';
            $loop = User::where("is_active" ,1)->where("is_deleted" ,0)->where('user_type',0)->get();
            $table = '
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>';
            if($loop) {
            foreach($loop as $key => $val){
            $table .= '<tr>
            			<td>'.++$key.'</td> 
            			<td>'.$val->name.'</td>
            			<td>'.$val->email.'</td>
            			<td></td>
            		</tr>';
            	}
            }
            $table .= '</tbody>
            <tfoot>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
               </tr>
            </tfoot>';
    	}
    	return view('adminiy.crud.crud')->with(compact('name','form','table'));
    	// dd("here");
    }
    public function sendmail()
    {
        return view('adminiy.fullwidgets.sendmail')->with('title','Send Email');
    }
	public function tutor_meeting_admin(){
		$tutor_meeting_admin = tutor_meeting_admin::orderBy('id','desc')->paginate(20);
		return view('adminiy.tutor_meeting_admin')->with('title','Tutor Meetings')
		->with('adminiy_tutor_meeting_admin',true)
		->with('tutor_meeting_admin',$tutor_meeting_admin);
	}
	public function tutor_meeting_admin_status($id,$status){
		$tutor_meeting_admin=tutor_meeting_admin::findOrfail($id);
		$tutor_meeting_admin->meeting_success=$status;
		$tutor_meeting_admin->save();
		return back()->with('notify_success','Meeting '.($status==1?'accepted':'rejected').', Notification sent');
	}
	public function tutor_meeting_admin_sendlink($id){
		$tutor_meeting_admin=tutor_meeting_admin::findOrfail($id);
		return redirect()->route('tutor.safeguardingvideo',[$tutor_meeting_admin->tutor_id]);
	}
	public function add_answers($id){
		$tutor_quiz_questions=tutor_quiz_questions::findOrfail($id);
		return view('adminiy.tutor_quiz_questions_answers')->with('title','Add Answers')
		->with('tutor_quiz_questions_ytmenu',true)
		->with('tutor_quiz_questions',$tutor_quiz_questions);
	}
	public function saveanswers(Request $request,$id){
		tutor_quiz_answers::where('question_id',$id)->delete();
		foreach($request->values as $value){
			$tutor_quiz_answers = new tutor_quiz_answers;
			$tutor_quiz_answers->question_id=$id;
			$tutor_quiz_answers->option_value=$value['option'];
			$tutor_quiz_answers->is_correct=$value['is_correct'];
			$tutor_quiz_answers->save();
		}
		$this->echoSuccess("saved");
	}
}
